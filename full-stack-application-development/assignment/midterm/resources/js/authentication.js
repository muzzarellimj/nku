/**
 * A rudimentary user authentication module to be utilised in the first iteration of PodScholar. This authentication
 * process utilises the [localStorage]{@link https://developer.mozilla.org/en-US/docs/Web/API/Window/localStorage}
 * browser property to either set or check the value of the 'authenticated' key.
 *
 * @author Michael Muzzarelli, muzzarellm1@nku.edu
 * @author Robert Adams, adamsr15@mymail.nku.edu
 */

/**
 * Set the value of the local storage 'authenticated' key.
 *
 * @param value		true if the user should be authenticated, false if they should not.
 */
function setAuthentication(value) {
	if (typeof value != 'boolean') {
		return console.error('The provided value of setAuthentication(value) must be of type boolean!');
	}

	value === true ? localStorage.setItem('userId', 'u00000000') : localStorage.removeItem('userId');

	localStorage.setItem('authenticated', `${value}`);
}

/**
 * Check the value of the local storage 'authenticated' key.
 *
 * @returns {boolean}	true if the user is authenticated, and false if not.
 */
function checkAuthentication() {
	return localStorage.getItem('authenticated') === 'true';
}