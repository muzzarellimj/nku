/**
 * Build the dynamic discover page content: the filter menu category selection and category content sections.
 */
async function buildDiscover() {
	await buildCategorySelection('filter-category')

	await buildContentSectionByCategory('Computer Science');
	await buildContentSectionByCategory('Environmental Science');
	await buildContentSectionByCategory('Exercise Science');
}

/**
 * Retrieve the category document and return the `categories` array within.
 *
 * @returns {Promise<Array>}	the `categories` array.
 */
async function buildCategoryOptions() {
	let document = await retrieveCategoryDocument();

	return document.categories;
}

/**
 * Build and append a series of {@link HTMLOptionElement} elements to a parent {@link HTMLSelectElement} element.
 *
 * @param parent	a parent {@link HTMLSelectElement} element.
 *
 * @returns {Promise<void>}		append the generated {@link HTMLOptionElement} elements to the {@link HTMLSelectElement}
 * parent element.
 */
async function buildCategorySelection(parent) {
	let categories = await buildCategoryOptions();
	let parentElement = document.getElementById(parent);

	categories.forEach(category => {
		let option = document.createElement('option');

		option.setAttribute('value', category);
		option.innerText = category;

		parentElement.append(option);
	});
}

/**
 * Build a content section - a 'row' container consisting of podcast 'card' elements - based on a provided category.
 *
 * @param category		the category the content should be built with respect to.
 *
 * @returns {Promise<void>}		append a built 'row' to the 'discover-content' parent element.
 */
async function buildContentSectionByCategory(category) {
	let podcasts = await retrievePodcastDocument();

	let row = document.createElement('div');
	row.setAttribute('class', 'row p-3');

	let heading = document.createElement('h1');
	heading.setAttribute('class', 'display-6 pt-2 content-heading');

	row.append(heading);

	switch (category) {
		case 'all':
			heading.innerText = 'All';

			podcasts.forEach(podcast => {
				row.append(buildPodcastCard(podcast));
			});

			break;

		default:
			heading.innerText = category;
			let matching = [];

			podcasts.forEach(podcast => {
				if (podcast.categorization.category === category) {
					matching.push(podcast);
				}
			});

			matching.forEach(podcast => row.append(buildPodcastCard(podcast)));
			break;
	}

	document.getElementById('discover-content').append(row);
}

/**
 * Build a Bootstrap 'card' element with respect to a particular podcast and corresponding data attributes.
 *
 * @param podcast	the podcast for which the 'card' should contain data.
 *
 * @returns {HTMLDivElement}	a built 'card' element.
 */
function buildPodcastCard(podcast) {
	let container = document.createElement('div');
	container.setAttribute('class', 'col-12 col-md-6 col-xl-4');

	let card = document.createElement('div');
	card.setAttribute('class', 'card');

	let body = document.createElement('div');
	body.setAttribute('class', 'card-body');

	let title = document.createElement('h5');
	title.setAttribute('class', 'card-title');
	title.innerText = podcast.content.title;

	let authorText = document.createElement('p');
	authorText.setAttribute('class', 'card-text');

	let authorLink = document.createElement('a');
	authorLink.setAttribute('class', 'inline-link');
	authorLink.setAttribute('href', 'author.html?id=' + podcast.id.author);
	authorLink.innerText = podcast.id.author;

	let button = document.createElement('a');
	button.setAttribute('class', 'btn btn-primary w-100');
	button.setAttribute('href', 'podcast.html?id=' + podcast.id.podcast)
	button.innerText = 'Learn More';

	authorText.append(authorLink);
	body.append(title, authorText, button);
	card.append(body);
	container.append(card);

	return container;
}

/**
 * Build a user profile based on a provided user UID.
 *
 * @param id	the UID for which a profile should be generated.
 *
 * @returns {Promise<void>}		append a series of built 'row' elements to the main section of `user.html`.
 */
async function buildUserProfile(id) {
	/* retrieve and store the user */
	let user = await retrieveUser(id);

	/* if the user is null or undefined, un-authenticate and reroute to sign-in */
	if (user === null || user === undefined) {
		setAuthentication(false);

		window.location.href = 'sign-in.html';
	}

	/* retrieve and store the parent element (main) */
	let parent = document.querySelector('main');

	/* modify the document title to include first and last name */
	document.title = `PodScholar | ${user.name.first} ${user.name.last}`;

	/* build the .container-fluid element */
	let container = document.createElement('div');
	container.setAttribute('class', 'container-fluid');

	/* build first row: profile avatar and welcome message */
	let header = document.createElement('div');
	header.setAttribute('class', 'row align-items-center');

	let avatarContainer = document.createElement('div');
	avatarContainer.setAttribute('class', 'col-12 col-sm-4 py-5');

	let avatar = document.createElement('img');
	avatar.setAttribute('style', 'width: 75%; border-radius: 50%;');
	avatar.setAttribute('src', user.profile.avatar);
	avatar.setAttribute('alt', `${user.name.first} ${user.name.last}'s avatar`);

	avatarContainer.append(avatar);

	let descriptorContainer = document.createElement('div');
	descriptorContainer.setAttribute('class', 'col-12 col-sm-8 py-5');

	let nameRow = document.createElement('div');
	nameRow.setAttribute('class', 'row');

	let nameCol = document.createElement('div');
	nameCol.setAttribute('class', 'col-12');

	let name = document.createElement('h1');
	name.setAttribute('class', 'display-4');
	name.innerText = `Hello, ${user.name.first} ${user.name.last}.`;

	nameCol.append(name);
	nameRow.append(nameCol);

	let statisticRow = document.createElement('div');
	statisticRow.setAttribute('class', 'row py-2');

	let authorStatisticContainer = document.createElement('div');
	authorStatisticContainer.setAttribute('class', 'col-12 col-md-4 col-xxl-3');

	let authorStatistic = document.createElement('p');
	authorStatistic.setAttribute('class', 'statistic-text');
	authorStatistic.innerHTML = `<a class="inline-link" href="#"><i class="bi bi-person-plus-fill pe-2"></i>Following ${user.curation.author.length} Authors</a>`;

	authorStatisticContainer.append(authorStatistic);

	let podcastStatisticContainer = document.createElement('div');
	podcastStatisticContainer.setAttribute('class', 'col-12 col-md-4 col-xxl-3');

	let podcastStatistic = document.createElement('p');
	podcastStatistic.setAttribute('class', 'statistic-text');
	podcastStatistic.innerHTML = `<a class="inline-link" href="#"><i class="bi bi-heart-fill pe-2"></i>Favorited ${user.curation.podcast.length} Podcasts</a>`;

	podcastStatisticContainer.append(podcastStatistic);

	let authorProfileContainer = document.createElement('div');
	authorProfileContainer.setAttribute('class', 'col-12 col-md-4 col-xxl-3');

	let authorProfile = document.createElement('p');
	authorProfile.setAttribute('class', 'statistic-text');
	authorProfile.innerHTML = `<a class="inline-link" href="author.html?id=${user.id.author}"><i class="bi bi-mic-fill pe-2"></i>View Author Profile</a>`;

	authorProfileContainer.append(authorProfile);

	if (user.id.author !== null) {
		statisticRow.append(authorStatisticContainer, podcastStatisticContainer, authorProfileContainer);
	} else {
		statisticRow.append(authorStatisticContainer, podcastStatisticContainer);
	}

	descriptorContainer.append(nameRow, statisticRow);

	header.append(avatarContainer, descriptorContainer);

	/* build second row: followed author profiles */
	let authorCuration = document.createElement('div');
	authorCuration.setAttribute('class', 'row align-items-center p-4');

	let authorCurationHeading = document.createElement('div');
	authorCurationHeading.setAttribute('class', 'user-profile-section-heading');
	authorCurationHeading.innerText = 'Followed Authors';

	authorCuration.append(authorCurationHeading);

	user.curation.author.forEach(author => {
		retrieveUserDocument().
			then(document => {
				document.forEach(user => {
					if (user.id.author === author) {
						authorCuration.append(buildAuthorCard(user));
					}
				});
			});
	});

	/* build third row: favorited podcasts */
	let podcastCuration = document.createElement('div');
	podcastCuration.setAttribute('class', 'row align-items-center p-4');

	let podcastCurationHeading = document.createElement('div');
	podcastCurationHeading.setAttribute('class', 'user-profile-section-heading');
	podcastCurationHeading.innerText = 'Favorited Podcasts';

	podcastCuration.append(podcastCurationHeading);

	user.curation.podcast.forEach(id => {
		retrievePodcastDocument().
			then(document => {
				document.forEach(podcast => {
					if (podcast.id.podcast === id) {
						podcastCuration.append(buildPodcastCard(podcast));
					}
				});
			});
	});

	container.append(header, authorCuration, podcastCuration);

	parent.append(container);
}

/**
 * Build a Bootstrap 'card' element with respect to a particular author and corresponding data attributes.
 *
 * @param author	the author for which the 'card' should contain data.
 *
 * @returns {HTMLDivElement}	a built 'card' element.
 */
function buildAuthorCard(author) {
	let container = document.createElement('div');
	container.setAttribute('class', 'col-12 col-sm-4 col-xl-3 col-xxl-2 p-3 text-center');

	let card = document.createElement('div');
	card.setAttribute('class', 'card');

	let image = document.createElement('img');
	image.setAttribute('class', 'card-img-top');
	image.setAttribute('src', author.profile.avatar);
	image.setAttribute('alt', `${author.name.first} ${author.name.last}'s Avatar`);

	let body = document.createElement('div');
	body.setAttribute('class', 'card-body');

	let authorText = document.createElement('p');
	authorText.setAttribute('class', 'card-text');

	let authorLink = document.createElement('a');
	authorLink.setAttribute('class', 'inline-link');
	authorLink.setAttribute('href', 'author.html?id=' + author.id.author);
	authorLink.innerText = `${author.name.first} ${author.name.last}`;

	authorText.append(authorLink);
	body.append(authorText);
	card.append(image, body);
	container.append(card);

	return container;
}

/**
 * Build the dynamic author profile page content
*/
async function buildAuthorProfile(authorID) {

	/* Retrieve JSON for Author */
	let authorJSON = await retrieveAuthor(authorID).then(result => { return result; });

	/* Retrieve JSON for Author's User Details */
	let userJSON = await retrieveUsertbyAuthorId(authorID).then(result => { return result; });

	/* Create Author Profile Section */
	buildAuthorProfileDetails(userJSON, authorJSON);

	/* Create Author's Podcast Feed Section*/
	buildPodcastFeed(authorJSON.work.creator);
}

/**
 * Build the author profile element with respect to a particular author and corresponding data attributes.
 *
 * @param userDetails	the JSON file that contains data for the user details
 *
 * @also 
 * 
 * @param  authorDetails the JSON file that contains data for the author details
 * 
 * @returns {HTMLDivElement}	a built 'author-profile-details' element.
 */
 function buildAuthorProfileDetails(userDetails, authorDetails) {

	/* First Row - Heading*/ 
	let headerRow = document.createElement('div');
	headerRow.setAttribute('class', 'row p-2');

	let heading = document.createElement('h1');
	heading.setAttribute('class', 'display-6 pt-5 content-heading');
	heading.innerText = "Author Profile"

	let divider = document.createElement('hr');

	headerRow.append(heading, divider);

	/*Second Row - Author Details*/
	let authorDetailsRow = document.createElement('div');
	authorDetailsRow.setAttribute('class', 'row p-2');

	let avatarColumn = document.createElement('div');
	avatarColumn.setAttribute('class', 'col-6 col-lg-4 col-xl-6');

	let avatar = document.createElement('img');
	avatar.setAttribute('src', userDetails.profile.avatar);
	avatar.setAttribute('class', 'mx-2')

	avatar.style.borderRadius ="500px";
	avatar.style.width = "200px";

	avatarColumn.append(avatar);

	let authorInformationColumn = document.createElement('div');
	authorInformationColumn.setAttribute('class', 'col-6 col-lg-8 col-xl-6 pt-6');
	
	let name = document.createElement('p');
	name.innerHTML = "<strong> Name: </strong>" + userDetails.name.first + " " + userDetails.name.last;

	let organization = document.createElement('p');
	organization.innerHTML = "<strong> Organization: </strong>" + authorDetails.institution.organization;

	let title = document.createElement('p');
	title.innerHTML = "<strong> Title: </strong>" + authorDetails.institution.title;

	let email = document.createElement('p');
	email.innerHTML = "<strong> Email: </strong>" + userDetails.account.email;

	authorInformationColumn.append(name, organization, title, email);

	authorDetailsRow.append(avatarColumn, authorInformationColumn);

	/*Third Row - Author Description*/ 
	let authorDescriptionRow = document.createElement('div');
	authorDescriptionRow.setAttribute('class', 'row p-2');

	let subHeading = document.createElement('h3');
	subHeading.setAttribute('class', 'pt-2');
	subHeading.innerText = "About the Author"

	let about = document.createElement('p');
	about.innerText = authorDetails.profile.about;

	authorDescriptionRow.append(subHeading, about);

	/*Append*/
	document.getElementById('author-profile-details').append(headerRow, authorDetailsRow, authorDescriptionRow);
}

/**
 * Build the podcast feed element with repect to a particular author's podcast list.
 *
 * @param userPodcasts	the JSON file that contains data for the user podcasts.
 * 
 * @returns {HTMLDivElement}	a built 'author-profile-podcast-feed' element.
*/
 async function buildPodcastFeed(userPodcasts) {
	let podcasts = await retrievePodcastDocument();

	let row = document.createElement('div');
	row.setAttribute('class', 'row p-2');

	let heading = document.createElement('h1');
	heading.setAttribute('class', 'display-6 pt-lg-2 pt-xl-5 content-heading');
	heading.innerText = "Podcast Feed"

	let divider = document.createElement('hr');

	row.append(heading, divider);

	for (i = 0; i < userPodcasts.length; i++) {
		podcasts.forEach(podcast => {
			if (podcast.id.podcast == userPodcasts[i]) {
				let postCard = buildPodcastCard(podcast);
				postCard.setAttribute('class', 'col-12 col-sm-6 col-xl-6 col-xxl-4 p-3');
				row.append(postCard);
			}
		})
	}

	document.getElementById('author-profile-podcast-feed').append(row);

}

/**
 * Build the podcast fields on a podcast page from the querystring.
 * Potential TODO: Make this page inaccesible if there is no querystring.
 *
 * @param podcastID the ID of the podcast to be parsed
 */
async function buildPodcast(podcastID) {

	// Build the appropriate JSON for the podcast with the querystring podcast ID
	let podcastJSON =   await retrievePodcast(podcastID);

	console.log(podcastJSON);

	// Create the variables to hold the elements to be filled in
	let podcastTitleElement = document.getElementById('podcast-title-heading');
	let podcastAudioElement = document.getElementById('podcast-audio');
	let podcastDescriptionElement = document.getElementById('podcast-description');

	let podcastPublicationTitleElement = document.getElementById('title-of-research-document-value');
	let podcastPublicationSourceElement = document.getElementById('source-of-research-document-value');
	let podcastPublicationDoiElement = document.getElementById('doi-of-research-document-value');
	let podcastPublicationDateElement = document.getElementById('date-of-research-document-value');
	let podcastCategorizationCategoryElement = document.getElementById('category-of-research-document-value');
	let podcastCategorizationKeywordsElement = document.getElementById('keywords-of-research-document-value');



	// Assign the elements their data from the JSON
	podcastTitleElement.innerHTML = `${podcastJSON.content.title}`;
	/*
	Depending on how the webserver is set up it might not allow
	audio to be streamed because it might be set to
	"Content-Type" of "text/html". This issue is server side but
	you can validate that the data has been received and inserted
	into the page by checking the HTML of the web page using the
	developer tools of your browser
	*/
	// The audio element is currently styled inline
	podcastAudioElement.innerHTML = `
                <audio controls style="display: block; width: 100%">
                    <source src="${podcastJSON.content.audio}" type="audio/mpeg" />
                    Your browser does not support the audio element.
                </audio>`;
	podcastDescriptionElement.innerHTML = `${podcastJSON.content.description}`;

	// Publication assignment
	podcastPublicationTitleElement.innerHTML = `${podcastJSON.publication.title}`;
	podcastPublicationSourceElement.innerHTML = `${podcastJSON.publication.source}`;
	/*
	The logic behind making this open in a new tab is that if
	you're listening to a podcast you probably don't want your
	podcast ended because you clicked a link. To avoid this it
	will always open the DOI source in a new tab.
	*/
	podcastPublicationDoiElement.innerHTML = `<a href="https://doi.org/${podcastJSON.id.object}" target="_blank">${podcastJSON.id.object}</a>`;
	podcastPublicationDateElement.innerHTML = `${podcastJSON.publication.date}`;

	// Categorization assignment
	podcastCategorizationCategoryElement.innerHTML = `${podcastJSON.categorization.category}`;
	podcastCategorizationKeywordsElement.innerHTML = `${podcastJSON.categorization.keyword.toString().replaceAll(',', ', ')}`;

	await buildAuthorMetadata(podcastJSON);
}

/**
 * Build the author metadata from a provided JSON document.
 *
 * @param podcastJSON	the JSON document corresponding to the author for which metadata is being retrieved.
 *
 * @returns {Promise<void>}		append and write the innerHTML of author metadata elements.
 */
async function buildAuthorMetadata(podcastJSON) {
	// Get the data for the author and the user to build metadata
	let podcastAuthorID = podcastJSON.id.author;
	let authorJSON =    await retrieveAuthor(podcastAuthorID);
	console.log(authorJSON);
	let userJSON =      await retrieveUserFromAuthorID(podcastAuthorID);
	console.log(userJSON);

	// Create the variables to hold the elements to be filled in
	let authorProfilePictureElement = document.getElementById('author-profile-picture');
	let authorNameElement = document.getElementById('author-name-value');
	let authorOrganizationElement = document.getElementById('author-organization-value');
	let authorTitleElement = document.getElementById('author-title-value');
	let authorEmailElement = document.getElementById('author-email-value');

	// Assign the values
	authorProfilePictureElement.src = userJSON.profile.avatar;
	authorNameElement.innerHTML = `${userJSON.name.first} ${userJSON.name.last}`;
	authorOrganizationElement.innerHTML = `${authorJSON.institution.organization}`;
	authorTitleElement.innerHTML = `${authorJSON.institution.title}`;
	authorEmailElement.innerHTML = `<a href="mailto:${userJSON.account.email}">${userJSON.account.email}</a>`;

}

/**
 * Forked from retrieveUser(). Because I want to know the name
 * of the author I need to retrieve the information listed in
 * the user's profile so I need a function to get the user from
 * the authorID.
 *
 * @param authorID	the ID of the author who published a podcast
 *
 * @returns {Promise<JSON>}		the corresponding JSON object should it exist, or null if it does not.
 */
async function retrieveUserFromAuthorID(authorID) {
	let document = await retrieveUserDocument();
	let match = null;

	document.forEach(object => {
		if (object.id.author === authorID) {
			match = object;
		}
	});

	return match;
}