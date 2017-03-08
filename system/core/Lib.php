<?php
/**
 * <PROJECT_NAME>
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright 2017, Poli Júnior Engenharia
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	<PROJECT_NAME>
 * @author <AUTHOR>
 * @copyright 2017, <COPYRIGHT>
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link <REPOSITORY_LINK>
 */

defined('BASE_PATH') OR exit('No direct script access allowed');

/**
 * Establishes the inheritance basis for all libraries instantiated
 * in the execution of controllers.
 *
 * Libraries are objects that defines basic functions in a subject.
 * The Lib class defines all other libs commom methods and properties,
 * each child lib will contain functions that helps the controller to
 * execute specific tasks, like upload, encryption and other stuffs.
 *
 * All libraries must be instantiated as properties of a controller
 * and will be used by them to shortcut codes by the use of their
 * methods.
 * 
 * @package		<PROJECT_NAME>
 * @subpackage	Core
 * @author 		<AUTHOR>
 * @link		<DOC_LINK>
 */

class Lib
{
	function __construct()
	{
		
	}
}