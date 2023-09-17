/**
 * This file has all the jquery functions for admin panel settings page of that plugin
 *
 * @since      1.0.0
 * @package    Team_Members_Display
 * @subpackage Team_Members_Display/admin/js
 */

(function ($) {
	$( document ).ready(
		function () {

			// Settings tab sections show & hide on button click.
			function show_content_styles() {
				$( 'form .form-table:eq(0)' ).show();
				$( 'form .form-table:eq(1)' ).hide();
				$( 'form .form-table:eq(2)' ).hide();
				$( 'form h2' ).hide();
			}
			show_content_styles();

			$( '#content-tab ' ).on(
				'click',
				function (e) {
					e.preventDefault();
					show_content_styles();

				}
			);

			$( '#style-tab' ).on(
				'click',
				function (e) {
					e.preventDefault();
					$( 'form .form-table:eq(0)' ).hide();
					$( 'form .form-table:eq(2)' ).hide();
					$( 'form .form-table:eq(1)' ).show();

				}
			);
			$( '#advanced-tab' ).on(
				'click',
				function (e) {
					e.preventDefault();
					$( 'form .form-table:eq(0)' ).hide();
					$( 'form .form-table:eq(1)' ).hide();
					$( 'form .form-table:eq(2)' ).show();

				}
			);

			// Load settings changes instently on the settings page
			// ------------------------
			// container section
			// ------------------------
			// Team column layout.
			$( '#tms-columns-select' ).on(
				'change',
				function () {
					var selectdValue = $( this ).val();
					$( '.rs-single-team-member' ).css( 'width', selectdValue );
				}
			);

			// Show or hide box shadow.
			var checkbox = $( '#tms_member_box_shadow' );
			checkbox.on(
				'click',
				function () {
					if (this.checked) {
						$( '.rs-single-team-member' ).css( 'box-shadow', '5px 5px 20px 0px #606060' );
					} else {
						$( '.rs-single-team-member' ).css( 'box-shadow', '' );
					}
				}
			);

			// member image height.
			$( 'input[name="tms_member_image_height"]' ).on(
				'input',
				function () {
					var input = $( this ).val();
					$( 'img.tm-s-image' ).css( 'height', input + 'px' );
				}
			);
			// Name font size.
			$( 'input[name="tms_name_font_size"]' ).on(
				'input',
				function () {
					var input = $( this ).val();
					$( 'h3.tm-s-name' ).css( 'font-size', input + 'px' );
				}
			);
			// Designation font size.
			$( 'input[name="tms_designation_font_size"]' ).on(
				'input',
				function () {
					var input = $( this ).val();
					$( 'p.tm-s-position' ).css( 'font-size', input + 'px' );
				}
			);
			// Description font size.
			$( 'input[name="tms_description_font_size"]' ).on(
				'input',
				function () {
					var input = $( this ).val();
					$( 'p.tm-s-description' ).css( 'font-size', input + 'px' );
				}
			);
			// Social profile icon size.
			$( 'input[name="tms_social_profile_icon_size"]' ).on(
				'input',
				function () {
					var input     = $( this ).val();
					var input     = parseInt( input );
					var extra     = parseInt( 16 );
					var icon_size = input + extra;
					$( 'a.tm-s-social i' ).css(
						{
							'font-size': input + 'px',
							'width': icon_size + 'px',
							'height': icon_size + 'px',
							'line-height': icon_size + 'px',

						}
					);
				}
			);

			// ------------------------
			// Style section
			// ------------------------
			// member_box_background_color.
			$( 'input[name="tms_member_box_background_color"]' ).wpColorPicker(
				{
					change: function (event, ui) {
						var newColor = ui.color.toString();
						$( '.rs-single-team-member' ).css( 'background-color', newColor );
					},
					clear: function () {
						$( '.rs-single-team-member' ).css( 'background-color', '' );
					}
				}
			);

			// tms_member_name_color.
			$( 'input[name="tms_member_name_color"]' ).wpColorPicker(
				{
					change: function (event, ui) {
						var newColor = ui.color.toString();
						$( 'h3.tm-s-name' ).css( 'color', newColor );
					},
					clear: function () {
						$( 'h3.tm-s-name' ).css( 'color', '' );
					}
				}
			);

			// tms_member_designation_color.
			$( 'input[name="tms_member_designation_color"]' ).wpColorPicker(
				{
					change: function (event, ui) {
						var newColor = ui.color.toString();
						$( 'p.tm-s-position' ).css( 'color', newColor );
					},
					clear: function () {
						$( 'p.tm-s-position' ).css( 'color', '' );
					}
				}
			);

			// tms_member_description_color.
			$( 'input[name="tms_member_description_color"]' ).wpColorPicker(
				{
					change: function (event, ui) {
						var newColor = ui.color.toString();
						$( 'p.tm-s-description' ).css( 'color', newColor );
					},
					clear: function () {
						$( 'p.tm-s-description' ).css( 'color', '' );
					}
				}
			);

			// tms_social_icon_color.
			$( 'input[name="tms_social_icon_color"]' ).wpColorPicker(
				{
					change: function (event, ui) {
						var newColor = ui.color.toString();
						$( 'a.tm-s-social i' ).css( 'color', newColor );
					},
					clear: function () {
						$( 'a.tm-s-social i' ).css( 'color', '' );
					}
				}
			);

			// tms_social_background_color.
			$( 'input[name="tms_social_background_color"]' ).wpColorPicker(
				{
					change: function (event, ui) {
						var newColor = ui.color.toString();
						$( 'a.tm-s-social i' ).css( 'background-color', newColor );
					},
					clear: function () {
						$( 'a.tm-s-social i' ).css( 'background-color', '' );
					}
				}
			);

		}
	);
})( jQuery );
