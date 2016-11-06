<?php

use Zmanim\Zman;

class MoadimTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_knows_when_it_is_rosh_chodesh()
    {
        $this->assertTrue(Zman::parse('November 1, 2016')->isRoshChodesh());
        $this->assertTrue(Zman::parse('November 2, 2016')->isRoshChodesh());
        $this->assertFalse(Zman::parse('November 3, 2016')->isRoshChodesh());
    }

    /** @test */
    public function it_knows_when_it_is_yom_kippur()
    {
        $this->assertTrue(Zman::parse('October 12, 2016')->isYomKippur());
        $this->assertFalse(Zman::parse('October 13, 2016')->isYomKippur());
    }

    /** @test */
    public function it_knows_when_it_is_tzom_gedaliah()
    {
        // Normal Year
        $this->assertTrue(Zman::parse('October 5, 2016')->isTzomGedaliah());
        $this->assertFalse(Zman::parse('October 6, 2016')->isTzomGedaliah());

        // Year of a Nidcheh
        $this->assertTrue(Zman::parse('September 24, 2017')->isTzomGedaliah());
        $this->assertFalse(Zman::parse('September 23, 2017')->isTzomGedaliah());
    }

    /** @test */
    public function it_knows_it_is_asara_biteives()
    {
        $this->assertTrue(Zman::parse('January 8, 2017')->isAsaraBiteives());
        $this->assertFalse(Zman::parse('January 9, 2017')->isAsaraBiteives());
    }

    /** @test */
    public function it_knows_it_is_taanis_esther()
    {
        // Normal Year
        $this->assertTrue(Zman::parse('February 28, 2018')->isTaanisEsther());
        $this->assertFalse(Zman::parse('March 1, 2018')->isTaanisEsther());

        // Nidcheh Year
        $this->assertTrue(Zman::parse('March 9, 2017')->isTaanisEsther());
        $this->assertFalse(Zman::parse('March 11, 2017')->isTaanisEsther());
    }

    /** @test */
    public function it_knows_it_is_shiva_asar_bitamuz()
    {
        // Normal Year
        $this->assertTrue(Zman::parse('July 11, 2017')->isShivaAsarBitamuz());
        $this->assertFalse(Zman::parse('July 12, 2017')->isShivaAsarBitamuz());

        // Nidcheh Year
        $this->assertTrue(Zman::parse('July 1, 2018')->isShivaAsarBitamuz());
        $this->assertFalse(Zman::parse('June 30, 2018')->isShivaAsarBitamuz());
    }

    /** @test */
    public function it_knows_it_is_tisha_bav()
    {
        // Normal Year
        $this->assertTrue(Zman::parse('August 1, 2017')->isTishaBav());
        $this->assertFalse(Zman::parse('August 2, 2017')->isTishaBav());

        // Nidcheh Year
        $this->assertTrue(Zman::parse('July 22, 2018')->isTishaBav());
        $this->assertFalse(Zman::parse('July 21, 2018')->isTishaBav());
    }

    /** @test */
    public function it_knows_when_it_is_a_fast_day()
    {
        $this->assertTrue(Zman::parse('October 5, 2016')->isFastDay());  // Tzom Gedalya
        $this->assertTrue(Zman::parse('October 12, 2016')->isFastDay()); // Yom Kippur
        $this->assertTrue(Zman::parse('January 8, 2017')->isFastDay());  // Asara B'teives
        $this->assertTrue(Zman::parse('March 9, 2017')->isFastDay());    // Ta'anis Esther
        $this->assertTrue(Zman::parse('July 11, 2017')->isFastDay());    // Shiva Asar B'tamuz
        $this->assertTrue(Zman::parse('August 1, 2017')->isFastDay());   // Tisha B'av

        $this->assertFalse(Zman::parse('October 6, 2016')->isFastDay());
    }
}
