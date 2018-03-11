<?php

define('FOUR_CARDS', '4C');
define('FULL_HOUSE', 'FH');
define('THREE_CARDS', '3C');
define('TWO_PAIRS', '2P');
define('ONE_PAIR', '1P');
define('NO_HANDS', '--');

/**
* Get the poker hand of cards
*
* @param	string	$cards	A string represents for 5 cards
*
* @return	the suitable poker hand or FALSE if cards are invalid
**/
function poker_hand($cards) {
	if(!is_string($cards))
		return FALSE;
	$is_card = preg_match_all("/([SHDC])([2-9]|10|[JQKA])/", $cards, $matches);
	if($is_card > 0 && count($matches[0]) == 5) {
		$ranks = array_count_values($matches[2]);
		switch(count($ranks)) {
			case 4:
				$poker_hand = ONE_PAIR;
				break;
			case 3:
				if(in_array(3, $ranks))
					$poker_hand = THREE_CARDS;
				else $poker_hand = TWO_PAIRS;
				break;
			case 2:
				if(in_array(4, $ranks))
					$poker_hand = FOUR_CARDS;
				else $poker_hand = FULL_HOUSE;
				break;
			default:
				$poker_hand = NO_HANDS;			
		}
		return $poker_hand;
	}
	return FALSE;
}