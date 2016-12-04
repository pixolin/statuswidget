<?php
/**
 * Selector
 */
if ( ! class_exists( 'FES_Selector' ) ) {
	class FES_Selector {

		/**
	 * Output of Widget in Frontend
	 * Uses options set in menu page
	 * @return string $out
	 */
		function display() {
			$form = '<form class="fes-color" aria-hidden="true">
			     <fieldset>
			       <input type="radio" id="fes-default" name="fes-color" value="" checked="checked">
			       <label for="fes-default" class="fes-default"></label>
			       <input type="radio" id="fes-one" name="fes-color" value="fes-color-one">
			       	<label for="fes-one" class="fes-one"></label>
			       <input type="radio" id="fes-two" name="fes-color" value="fes-color-two">
			       	<label for="fes-two" class="fes-two"></label>
			       <input type="radio" id="fes-three" name="fes-color" value="fes-color-three">
			       	<label for="fes-three" class="fes-three"></label>
			     </fieldset>
			     </form>';
			return $form;
		}
	}
} // if(! class_exists())
