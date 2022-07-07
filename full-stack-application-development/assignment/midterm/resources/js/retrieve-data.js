/**
 * The endpoint utilised in accessing a particular JSON Blob in a [GET]{@link https://jsonblob.com/api#get},
 * [PUT]{@link https://jsonblob.com/api#put}, or [DELETE]{@link https://jsonblob.com/api#delete} request.
 */
const GET_ENDPOINT = 'https://jsonblob.com/api/jsonBlob/';

/**
 * The endpoint utilised in creating a new JSON Blob in a [POST]{@link https://jsonblob.com/api#post} request.
 */
const POST_ENDPOINT = 'https://jsonblob.com/api/jsonBlob';

/**
 * The JSON Blob ID of the author document.
 */
const AUTHOR_BLOB = '950254564695883776';

/**
 * The JSON Blob ID of the category document.
 */
const CATEGORY_BLOB = '951604363324047360';

/**
 * The JSON Blob ID of the podcast document.
 */
const PODCAST_BLOB = '950251742357110784';

/**
 * The JSON Blob ID of the user document.
 */
const USER_BLOB = '950253428945469440';

/**
 * Retrieve the document stored at {@link AUTHOR_BLOB}.
 *
 * @returns {Promise<JSON>}		the data within the document, parsed as JSON.
 */
async function retrieveAuthorDocument() {
	return await retrieve(AUTHOR_BLOB);
}

/**
 * Retrieve a particular author from the author document with the provided unique identifier (UID).
 *
 * @param id	the UID (field `id.author`) of the requested author.
 *
 * @returns {Promise<JSON>}		the corresponding JSON object should it exist, or null if it does not.
 */
async function retrieveAuthor(id) {
	let document = await retrieveAuthorDocument();
	let match = null;

	document.forEach(object => {
		if (object.id.author === id) {
			match = object;
		}
	});

	return match;
}

/**
 * Retrieve the document stored at {@link CATEGORY_BLOB}.
 *
 * @returns {Promise<JSON>}		the data within the document, parsed as JSON.
 */
async function retrieveCategoryDocument() {
	return await retrieve(CATEGORY_BLOB);
}

/**
 * Retrieve the document stored at {@link PODCAST_BLOB}.
 *
 * @returns {Promise<JSON>}		the data within the document, parsed as JSON.
 */
async function retrievePodcastDocument() {
	return await retrieve(PODCAST_BLOB);
}

/**
 * Retrieve a particular podcast from the podcast document with the provided unique identifier (UID).
 *
 * @param id	the UID (field `id.podcast`) of the requested podcast.
 *
 * @returns {Promise<JSON>}		the corresponding JSON object should it exist, or null if it does not.
 */
async function retrievePodcast(id) {
	let document = await retrievePodcastDocument();
	let match = null;

	document.forEach(object => {
		if (object.id.podcast === id) {
			match = object;
		}
	});

	return match;
}

/**
 * Retrieve the document stored at {@link USER_BLOB}.
 *
 * @returns {Promise<JSON>}		the data within the document, parsed as JSON.
 */
async function retrieveUserDocument() {
	return await retrieve(USER_BLOB);
}

/**
 * Retrieve a particular user from the user document with the provided unique identifier (UID).
 *
 * @param id	the UID (field `id.user`) of the requested user.
 *
 * @returns {Promise<JSON>}		the corresponding JSON object should it exist, or null if it does not.
 */
async function retrieveUser(id) {
	let document = await retrieveUserDocument();
	let match = null;

	document.forEach(object => {
		if (object.id.user === id) {
			match = object;
		}
	});

	return match;
}

/**
 * Create an HTTP request at {@link GET_ENDPOINT} with the provided blob ID to retrieve the document stored at that
 * address and return the data within as a JSON array.
 *
 * @param id	the JSON Blob ID of the necessary document.
 *
 * @returns {Promise<JSON>}		the data stored within the document, parsed as JSON.
 */
async function retrieve(id) {
	try {
		let response = await fetch(GET_ENDPOINT + id);

		return await response.json();

	} catch (error) {
		console.log(error);
	}
}

/**
 * Retrieve a particular user from the user document with the provided unique identifier (UID).
 *
 * @param id	the UID (field `id.user`) of the requested author.
 *
 * @returns {Promise<JSON>}		the corresponding JSON object should it exist, or null if it does not.
*/
 async function retrieveUsertbyAuthorId(id) {
	let document = await retrieveUserDocument();
	let match = null;

	document.forEach(object => {
		if (object.id.author === id) {
			match = object;
		}
	});

	return match;
}

/**
 * Function provided by Dr. Caporusso to parse query string values.
 *
 * @param url	the URL to be parsed.
 *
 * @returns {{}}	an array of parsed values.
*/
function getAllUrlParams(url) {
	var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
	var obj = {};

	if (queryString) {
		queryString = queryString.split('#')[0];
		var arr = queryString.split('&');

		for (var i = 0; i < arr.length; i++) {
			var a = arr[i].split('=');
			var paramName = a[0];
			var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];

			if (paramName.match(/\[(\d+)]$/)) {
				var key = paramName.replace(/\[(\d+)?/, '');
				if (!obj[key]) obj[key] = [];

				if (paramName.match(/\[\d+$/)) {
					var index = /\[(\d+)/.exec(paramName)[1];
					obj[key][index] = paramValue;
				} else {
					obj[key].push(paramValue);
				}
			} else {
				if (!obj[paramName]) {
					obj[paramName] = paramValue;
				} else if (obj[paramName] && typeof obj[paramName] === 'string') {
					obj[paramName] = [obj[paramName]];
					obj[paramName].push(paramValue);
				} else {
					obj[paramName].push(paramValue);
				}
			}
		}
	}

	return obj;
}