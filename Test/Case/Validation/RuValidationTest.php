<?php
/**
 * Russian Localized Validation class test case
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org
 * @package       Localized.Test.Case.Validation
 * @since         Localized Plugin v 1.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('RuValidation', 'Localized.Validation');

/**
 * RuValidationTest
 *
 * @package       Localized.Test.Case.Validation
 */
class RuValidationTest extends CakeTestCase {

/**
 * test the postal method of RuValidation
 *
 * @return void
 */
	public function testPostal() {
		$this->assertTrue(RuValidation::postal('101135'));
		$this->assertTrue(RuValidation::postal('693000'));

		$this->assertFalse(RuValidation::postal('100123'));
		$this->assertFalse(RuValidation::postal('200321'));
	}

/**
 * test phone method of RuValidation
 */
	public function testPhone() {
		$this->assertTrue(RuValidation::phone('+7 (342) 1234567'));
		$this->assertTrue(RuValidation::phone('+7 (41144) 1234'));
	}

/**
 * test date of dob method of RuValidation
 *
 * @return void
 */
	public function testDob() {
		$this->assertTrue(RuValidation::dob('1.1.1960'));
		$this->assertTrue(RuValidation::dob('01.01.1960'));

		$this->assertFalse(RuValidation::dob('00.00.1960'));
		$this->assertFalse(RuValidation::dob('1960.01.01'));
	}

/**
 * test address method of RuValidation
 *
 * @return void
 */
	public function testAddress() {
		$this->assertTrue(RuValidation::address1('Московский пр., д. 100'));
		$this->assertTrue(RuValidation::address1('Moskovskiy ave., bld. 100'));

		$this->assertFalse(RuValidation::address1('I would not tell'));
	}

/**
 * test passport method of RuValidation
 *
 * @return void
 */
	public function testPassport() {
		$this->assertTrue(RuValidation::passport('1234 123456'));

		$this->assertFalse(RuValidation::passport('1234 1234567'));
		$this->assertFalse(RuValidation::passport('1234123456'));
		$this->assertFalse(RuValidation::passport('1234 1x3456'));
	}
/**
 * test vatin method of RuValidation
 *
 * @return void
 */
	public function testVatin() {
		$this->assertTrue(RuValidation::vatin('7710140679'));
		$this->assertTrue(RuValidation::vatin('772807592828'));

		// invalid checksums
		$this->assertFalse(RuValidation::vatin('7710140670'));
		$this->assertFalse(RuValidation::vatin('772807592837'));
	}

/**
 * test snils method of RuValidation
 *
 * @return void
 */
	public function testSnils() {
		$this->assertTrue(RuValidation::snils('112-233-445 95'));
		$this->assertTrue(RuValidation::snils('032-032-952 00'));

		// invalid checksum
		$this->assertFalse(RuValidation::snils('112-233-445 96'));
	}

}
