/**
 * This file has all the jquery functions for admin panel 'add new member & edit member' page of that plugin
 *
 * @since      1.0.0
 * @package    Team_Members_Display
 * @subpackage Team_Members_Display/admin/js
 */

(function ($) {
	$( document ).ready(
		function () {

			/**
			 * Ajax call
			 */
			$( '#add-new-member' ).on(
				'click',
				function (e) {
					var clickedButton = $( this );
					e.preventDefault();
					$.get(
						add_new_member_obj.ajax_url,
						{
							action: "add_new_member",
						},
						function (response) {
							$( '#all-team-members' ).append( response );
						}
					);
				}
			);

			// social repiter.
			$( document ).on(
				'click',
				'.add-social-row',
				function () {
					var output = '<div class="social-row">' +
					'<select name="social_icons[]">' +
					'<option value="fa-facebook">Facebook</option>' +
					'<option value="fa-twitter">Twitter</option>' +
					'<option value="fa-instagram">Instagram</option>' +
					'<option value="fa-linkedin">LinkedIn</option>' +
					'<option value="fa-pinterest">Pinterest</option>' +
					'<option value="fa-youtube">YouTube</option>' +
					'<option value="fa-vimeo">Vimeo</option>' +
					'<option value="fa-tumblr">Tumblr</option>' +
					'<option value="fa-flickr">Flickr</option>' +
					'<option value="fa-github">GitHub</option>' +
					'<option value="fa-bitbucket">Bitbucket</option>' +
					'<option value="fa-gitlab">GitLab</option>' +
					'<option value="fa-behance">Behance</option>' +
					'<option value="fa-dribbble">Dribbble</option>' +
					'<option value="fa-skype">Skype</option>' +
					'<option value="fa-whatsapp">WhatsApp</option>' +
					'<option value="fa-telegram">Telegram</option>' +
					'<option value="fa-slack">Slack</option>' +
					'<option value="fa-medium">Medium</option>' +
					'<option value="fa-tiktok">TikTok</option>' +
					'</select>' +
					'<input type="text" name="social_links[]" placeholder="Social Link">' +
					'<a href="#" class="remove-row">Remove</a>' +
					'</div>';

					$( this ).before( output );
				}
			);

			// deleting a member.
			$( document ).on(
				'click',
				'.delete_single',
				function () {
					var teamMember = $( this ).parents( '.single-team-member' );
					if (confirm( 'Are you sure you want to delete this team member' )) {
						teamMember.animate(
							{ height: '0px' },
							function () {
								teamMember.remove();
							}
						);
					}
				}
			);

			// Delete all members.
			$( '.delete-all-members' ).on(
				'click',
				function () {
					if (confirm( 'Are you sure you want to delete all members' )) {

						$( '#all-team-members .single-team-member' ).animate(
							{ height: '0px' },
							function () {
								$( this ).remove();
							}
						);

					}
				}
			);

			// Media upload.
			$( document ).on(
				"click",
				'.select-image-button',
				function (e) {
					e.preventDefault();

					// Create a variable to store the media frame.
					var mediaFrame;

					// save the button that has been clicked.
					var clickButton = $( this );

					// If the media frame already exists, reopen it.
					if (mediaFrame) {
						mediaFrame.open();
						return;
					}

					// Create a new media frame.
					mediaFrame = wp.media(
						{
							title: 'Select an Image',
							button: {
								text: 'Use this image'
							},
							multiple: false // Set to true if you want to allow multiple image selection.
						}
					);

					// When an image is selected, update the image element.
					mediaFrame.on(
						'select',
						function () {
							var attachment = mediaFrame.state().get( 'selection' ).first().toJSON();
							clickButton.siblings( 'img' ).attr( 'src', attachment.url );
							clickButton.siblings( '.hidden-img' ).val( attachment.url );

						}
					);

					// Open the media frame.
					mediaFrame.open();
				}
			);

			// Make the members shortable.
			jQuery( '#all-team-members' ).sortable( {} );

			// team members toolbar.
			$( '.tm-s-collapse-rows' ).on(
				'click',
				function (e) {
					e.preventDefault();
					$( '#all-team-members' ).hide( 'slow' );
				}
			);
			$( '.tm-s-expand-rows' ).on(
				'click',
				function (e) {
					e.preventDefault();
					$( '#all-team-members' ).show( 'slow' );
				}
			);

		}
	);
})( jQuery );