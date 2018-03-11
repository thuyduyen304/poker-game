<?php
use \PHPUnit\Framework\TestCase;

final class PokerHandTest extends TestCase
{
	/**
     * @dataProvider additionProvider
     */
    public function testPokerHand($cards, $pokerHand)
    {
		$this->assertEquals(poker_hand($cards), $pokerHand);
    }
	
	public function additionProvider()
    {
        return [
			['D4C4S4H4S9', FOUR_CARDS],
			['D4C4C8D8S4', FULL_HOUSE],
			['D4C4C2D8S4', THREE_CARDS],
            ['S8D3HQS3CQ', TWO_PAIRS],
            ['D4CAC9DJS4', ONE_PAIR],
			['D4C3C9D8SA', NO_HANDS],
			['D4C3C9D8', FALSE],
			['D4C3C9D8SAD5', FALSE],
			['ABC', FALSE],
			[array(1,2,3), FALSE],
        ];
    }
}