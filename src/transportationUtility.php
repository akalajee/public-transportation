<?php

/**
 * transportationUtility is a utility class that facilitates
 * creation of the needed transportation
 * displays the results to the screen
 * and runs the main program
 *
 * @version  $Revision: 1.0 $
 * @access   public
 */
require_once 'model/publicTransportationFactory.php';
require_once 'model/publicTransportation.php';

class transportationUtility {

    /**
     * main API call of the application
     * which creates transportation methods, 
     * sort them and finally create the textual 
     * description
     *
     * @param  array $boarding_cards_param , each array item consists of transportation_type 
     * and collection of mandatory (origin, destination) and optional parameters depending of that type
     * i.e if the type is flight, tripNumber, gateNumber, seatNumber and baggageDrop
     * train, will get tripNumber, seatNumber
     * aiport_bus, will get no specific additional inputs
     * @return string full text representation of all boarding cards
     * @access public
     */
    public function boarding_api(array $boarding_cards_param): string {

        $id = 0;
        $public_transportation_array = [];
        $order_array = [];
        $origin_array = [];
        $destination_array = [];
        foreach ($boarding_cards_param as $card_info) {
            $transportation_method = $card_info["transportationMethod"] ?? null;
            $origin = $card_info["origin"] ?? null;
            $destination = $card_info["destination"] ?? null;
            $trip_number = $card_info["tripNumber"] ?? null;
            $gate_number = $card_info["gateNumber"] ?? null;
            $seat_number = $card_info["seatNumber"] ?? null;
            $baggage_drop = $card_info["baggageDrop"] ?? null;

            $origin_array[$id] = $origin;
            $destination_array[$id] = $destination;
            $public_transportation_array[$id] = publicTransportationFactory::create($transportation_method, $origin, $destination, $trip_number, $gate_number, $seat_number, $baggage_drop);

            $id++;
        }


        $trip_start_index = $this->findTripStartPoint($origin_array, $destination_array);
        $order_array[] = $trip_start_index;
        $next_destination = $destination_array[$trip_start_index];
        unset($origin_array[$trip_start_index]);
        while (count($origin_array) > 0) {
            $nextIndex = $this->findNextBoardCard($next_destination, $origin_array);
            $order_array[] = $nextIndex;

            $next_destination = $destination_array[$nextIndex];
            unset($origin_array[$nextIndex]);
        }
        $public_transportation_array_sorted = $this->sortTransportationMethods($public_transportation_array, $order_array);
        return $this->produceList($public_transportation_array_sorted);
    }

    /**
     * this function is a utility function that returns
     * the index of the first city based on all the origins
     * and all destinations array. It checks if any of the 
     * origin cities do not occur in the destinations
     * which result in being the first starting point
     *
     * @param  array $origins , array of origin strings
     * @param  array $destinations , array of destination strings
     * @return integer , the index of the starting point of trip
     * @access private
     */
    private function findTripStartPoint(array $origins, array $destinations): int {
        for ($i = 0; $i < count($origins); $i++) {
            if (!in_array($origins[$i], $destinations)) {
                return $i;
            }
        }
    }

    /**
     * this is a utility function which returns the next destination index
     * from the input array
     * @param  string $current_destination , the current destination
     * @param  array $origins , array of origin strings
     * @return integer , the index of the next destination from the origins
     * @access private
     */
    private function findNextBoardCard(string $current_destination, array $origins): int {
        return array_search($current_destination, $origins);
    }

    /**
     * this is a utility function which returns friendly textual description of transportation methods
     * @param  array $public_transportation_array , array of transportation methonds
     * @return string , string representation of transportation methods
     * @access private
     */
    private function produceList(array $public_transportation_array): string {
        $i = 1;
        $output = "";
        foreach ($public_transportation_array as $public_transportation) {
            $output .= "$i.&nbsp;&nbsp;" . $public_transportation->describe() . "<br><br>";
            $i++;
        }

        $output .= "$i.&nbsp;&nbsp;You have arrived at your final destination.<br>";
        return $output;
    }

    /**
     * this is a utility function sorts transportation methods based on sorting keys
     * @param  array $public_transportation_array , array of transportation methonds
     * @param  array $sorting_keys , array of transportation methonds sorting keys
     * @return array , sorted array of $public_transportation_array
     * @access private
     */
    private function sortTransportationMethods(array $public_transportation_array, array $sorting_keys): array {
        $result = [];
        foreach ($sorting_keys as $value) {
            $result[] = $public_transportation_array[$value];
        }
        return $result;
    }

}
