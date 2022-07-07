/**
 * A local database of sorts from which the content will be built.
 *
 * @author Robert Adams
 */
const animals = [
	{
		"animalName"            :   "Benny",
		/* sample images courtesy of massimo mancini on unsplash (https://unsplash.com/@00mancio00) */
		"animalImages"          :   [ 'https://i.imgur.com/gcY1Jg6.jpg', 'https://i.imgur.com/y6hPdEf.jpg', 'https://i.imgur.com/3MXjQ06.jpg', 'https://i.imgur.com/Tu0W7Ux.jpg', 'https://i.imgur.com/ccUVSQw.jpg' ],
		"type"                  :   "Dog",
		"breed"                 :   "Australian Shepherd Cross",
		"secondBreed"           :   "",
		"sex"                   :   "Male",
		"color"                 :   "Brown / White",
		"declawed"              :   null,
		"spayedOrNeutered"      :   true,
		"age"                   :   "2Yrs 1Mths 4Wks (approx)",
		"size"                  :   "Large",
		"healthCheck"           :   true,
		"upToDateVaccinations"  :   true,
		"upToDateWorming"       :   true,
		"microchipped"          :   true,
		"animalID"              :   "23531",
		"microchipNumber"       :   "985113005872810",
		"isSuitableWithChildren":   false,
		"isOkWithDogs"          :   null,
		"isLaidBack"            :   null,
		"isShy"                 :   null,
		"likeCats"              :   null,
		"isSpecialNeeds"        :   null,
		"aboutMeDescription"    :   [],
		"inFosterCase"          :   false,
		"dogLocation"           :   "Kenton County Animal Shelter",
		"contactPhone"          :   "(859) 356-7400",
		"contactStreetAddress"  :   "1020 Mary Laidley",
		"contactCity"           :   "Ft Mitchell",
		"contactState"          :   "KY",
		"contactZip"            :   "41017"
	},
	{
		"animalName"            :   "Cornelia",
		/* sample images courtesy of loriane magnenat on unsplash (https://unsplash.com/@loriane_photography) */
		"animalImages"          :   [ 'https://i.imgur.com/3SUmR2g.jpg', 'https://i.imgur.com/HJ1Cb2I.jpg', 'https://i.imgur.com/XS7iBH8.jpg', 'https://i.imgur.com/U441X0r.jpg' ],
		"type"                  :   "Dog",
		"breed"                 :   "Boxer Cross",
		"secondBreed"           :   "",
		"sex"                   :   "Female",
		"color"                 :   "White",
		"declawed"              :   null,
		"spayedOrNeutered"      :   true,
		"age"                   :   "6Yrs 2Mths 3Wks (approx)",
		"size"                  :   "Large",
		"healthCheck"           :   true,
		"upToDateVaccinations"  :   true,
		"upToDateWorming"       :   true,
		"microchipped"          :   true,
		"animalID"              :   "23390",
		"microchipNumber"       :   "985113005872687",
		"isSuitableWithChildren":   null,
		"isOkWithDogs"          :   true,
		"isLaidBack"            :   true,
		"isShy"                 :   true,
		"likeCats"              :   null,
		"isSpecialNeeds"        :   null,
		"aboutMeDescription"    :   [
			"Cornelia is calm and quiet in their kennel. She needs a home willing to use positive reinforcement training to build their confidence. Cornelia is shy on first meeting but if you give her time they warm up quickly. She would so best in a calm quiet home due to their personality and demeanor.",
			"Cornelia seems to do well with other dogs and would love a buddy ti play with in their new home. We would suggest laid back, calm dogs in their new home. They are so low maintenance and calm, a hyper, playful dog might stress them out.",
			"We would suggest other dogs and/or children meet them prior to being adopted because we want to make sure they do not overwhelm him. In time with TLC, patience, and confidence building they will fit perfectly into their forever family."
		],
		"inFosterCase"          :   false,
		"dogLocation"           :   "Kenton County Animal Shelter",
		"contactPhone"          :   "(859) 356-7400",
		"contactStreetAddress"  :   "1020 Mary Laidley",
		"contactCity"           :   "Ft Mitchell",
		"contactState"          :   "KY",
		"contactZip"            :   "41017"
	},
	{
		"animalName"            :   "Hemingway",
		/* sample images courtesy of milada vigerova on unsplash (https://unsplash.com/@milada_vigerova) */
		"animalImages"          :   [ 'https://i.imgur.com/zBZ0037.jpg','https://i.imgur.com/di7GGxW.jpg', 'https://i.imgur.com/eunA94U.jpg' ],
		"type"                  :   "Cat",
		"breed"                 :   "Domestic Short Hair Cross",
		"size"                  :   "Large",
		"secondBreed"           :   "",
		"sex"                   :   "Male",
		"color"                 :   "Grey",
		"declawed"              :   false,
		"spayedOrNeutered"      :   true,
		"age"                   :   "3Yrs 3Wks (approx)",
		"healthCheck"           :   true,
		"upToDateVaccinations"  :   true,
		"upToDateWorming"       :   true,
		"microchipped"          :   null,
		"animalID"              :   "23897",
		"microchipNumber"       :   null,
		"isSuitableWithChildren":   null,
		"isOkWithDogs"          :   null,
		"isLaidBack"            :   null,
		"isShy"                 :   null,
		"likeCats"              :   false,
		"isSpecialNeeds"        :   true,
		"aboutMeDescription"    :   [],
		"inFosterCase"          :   false,
		"dogLocation"           :   "Kenton County Animal Shelter",
		"contactPhone"          :   "(859) 356-7400",
		"contactStreetAddress"  :   "1020 Mary Laidley",
		"contactCity"           :   "Ft Mitchell",
		"contactState"          :   "KY",
		"contactZip"            :   "41017"
	},
	{
		"animalName"            :   "Howard",
		/* sample images courtesy of seven song on unsplash (https://unsplash.com/@sevenbenzema) */
		"animalImages"          :   [ 'https://i.imgur.com/2JchadL.jpg', 'https://i.imgur.com/0TxjSWT.jpg', 'https://i.imgur.com/ngdQ2Ln.jpg' ],
		"type"                  :   "Cat",
		"breed"                 :   "Domestic Short Hair Cross",
		"size"                  :   "Large",
		"secondBreed"           :   "Russian",
		"sex"                   :   "Male",
		"color"                 :   "Grey",
		"declawed"              :   false,
		"spayedOrNeutered"      :   true,
		"age"                   :   "Adult",
		"healthCheck"           :   true,
		"upToDateVaccinations"  :   true,
		"upToDateWorming"       :   true,
		"microchipped"          :   true,
		"animalID"              :   "23882",
		"microchipNumber"       :   "985113006299853",
		"isSuitableWithChildren":   null,
		"isOkWithDogs"          :   null,
		"isLaidBack"            :   null,
		"isShy"                 :   null,
		"likeCats"              :   null,
		"isSpecialNeeds"        :   null,
		"aboutMeDescription"    :   [],
		"inFosterCase"          :   false,
		"dogLocation"           :   "Kenton County Animal Shelter",
		"contactPhone"          :   "(859) 356-7400",
		"contactStreetAddress"  :   "1020 Mary Laidley",
		"contactCity"           :   "Ft Mitchell",
		"contactState"          :   "KY",
		"contactZip"            :   "41017"
	},
	{
		"animalName"            :   "Niko",
		/* sample images courtesy of jelena senicic on unsplash (https://unsplash.com/@senchy) */
		"animalImages"          :   [ 'https://i.imgur.com/dS9NHIm.jpg', 'https://i.imgur.com/CchCdcR.jpg' ],
		"type"                  :   "Kitten",
		"breed"                 :   "Domestic Longhair Cross",
		"size"                  :   "Large",
		"secondBreed"           :   "",
		"sex"                   :   "Male",
		"color"                 :   "Grey Tabby / White",
		"declawed"              :   false,
		"spayedOrNeutered"      :   true,
		"age"                   :   "3Mths 3Wks",
		"healthCheck"           :   true,
		"upToDateVaccinations"  :   true,
		"upToDateWorming"       :   true,
		"microchipped"          :   true,
		"animalID"              :   "23541",
		"microchipNumber"       :   "985113006299812",
		"isSuitableWithChildren":   null,
		"isOkWithDogs"          :   null,
		"isLaidBack"            :   null,
		"isShy"                 :   null,
		"likeCats"              :   null,
		"isSpecialNeeds"        :   null,
		"aboutMeDescription"    :   [],
		"inFosterCase"          :   true,
		"dogLocation"           :   "Kenton County Animal Shelter",
		"contactPhone"          :   "(859) 356-7400",
		"contactStreetAddress"  :   "1020 Mary Laidley",
		"contactCity"           :   "Ft Mitchell",
		"contactState"          :   "KY",
		"contactZip"            :   "41017"
	},
	{
		"animalName"            :   "Wishbone",
		/* sample images courtesy of sébastien lavalaye on unsplash (https://unsplash.com/@lavalaye) */
		"animalImages"          :   [ 'https://i.imgur.com/vAZxuIY.jpg', 'https://i.imgur.com/FK9lI0V.jpg', 'https://i.imgur.com/ISOfbxX.jpg' ],
		"type"                  :   "Dog",
		"breed"                 :   "American Bulldog Cross",
		"size"                  :   "Large",
		"secondBreed"           :   "",
		"sex"                   :   "Male",
		"color"                 :   "Black",
		"declawed"              :   null,
		"spayedOrNeutered"      :   true,
		"age"                   :   "2Yrs 1Mths 4Wks (approx)",
		"healthCheck"           :   true,
		"upToDateVaccinations"  :   true,
		"upToDateWorming"       :   true,
		"microchipped"          :   true,
		"animalID"              :   "20579",
		"microchipNumber"       :   "985113004709947",
		"isSuitableWithChildren":   null,
		"isOkWithDogs"          :   null,
		"isLaidBack"            :   null,
		"isShy"                 :   null,
		"likeCats"              :   null,
		"isSpecialNeeds"        :   null,
		"aboutMeDescription"    :   [
			"Wishbone is a super sweet playful guy! He is around a 2 years old, but is still very much a puppy. He loves people and he, like any youngster, will need basic manner training and a patient home willing to put their time and energy into him. Wishbone also seems to play well with other dogs! His perfect doggy pal would be one that can keep up yet be tolerant of his playful antics. He would benefit from a home willing to exhaust his energy and keep him active . Wishbone might jump on you or play mouth because he is young and still learning. Wishbone will require a home with children 13 years and older because he gets so playful and excited he doesn't realize his size and strength. He truly is a smart young man just needs the right home to spoil him rotton! My past owner went through the process of getting me a registered as an Emotional Support Animal as well! And I have the Certificate to prove it!"
		],
		"inFosterCase"          :   false,
		"dogLocation"           :   "Kenton County Animal Shelter",
		"contactPhone"          :   "(859) 356-7400",
		"contactStreetAddress"  :   "1020 Mary Laidley",
		"contactCity"           :   "Ft Mitchell",
		"contactState"          :   "KY",
		"contactZip"            :   "41017"
	}
];

/**
 * A local database of constant attribute description values from which the attribute elements will be built.
 *
 * @author Michael Muzzarelli
 */
const attributeDescription = {
	healthCheckTrue: 'I have had a complete health check.',
	healthCheckFalse: 'I have NOT had a health check.',

	vaccinationTrue: 'I have an up-to-date vaccination record.',
	vaccinationFalse: 'I do NOT have an up-to-date vaccination record.',

	wormingTrue: 'I have an up-to-date record of worming.',
	wormingFalse: 'I do NOT have an up-to-date record of worming.',

	microchipTrue: 'I have a microchip and can be found in the database.',
	microchipFalse: 'I do NOT have a microchip.',

	suitableChildrenTrue: 'I do well with children around.',
	suitableChildrenFalse: 'I prefer not to have children around.',

	suitableDogTrue: 'I do well with other dogs around.',
	suitableDogFalse: 'I prefer not to have other dogs around.',

	suitableCatTrue: 'I do well with other cats around.',
	suitableCatFalse: 'I prefer not to have other cats around.',

	laidBackTrue: 'I am laid back and relaxed.',
	laidBackFalse: 'I am not laid back. I require a lot of attention.',

	shyTrue: 'I am shy and might play hide-and-seek without telling you.',
	shyFalse: 'I am not shy and make sure to let everyone know it.',

	specialNeedsTrue: 'I will require additional or special care.',
	specialNeedsFalse: 'I will not require any additional or special care.',

	fosterCareTrue: 'I am currently living in a foster home.',
	fosterCareFalse: 'I am not currently living in a foster home.'
}

/**
 * Build the index content - dynamically generated Bootstrap card elements containing animal information and a link to
 * the details page pertaining that animal - and append it to the index document. Note: this function is to be called
 * independently in the index document to invoke this function on page load.
 */
function buildIndex() {
	let parent = document.getElementById('index-parent');

	for (let i = 0; i < animals.length; i++) {
		let animal = animals[i];

		parent.append(buildIndexCardElement(animal, i));
	}
}

/**
 * Build a detail document of information pertaining to a particular animal selected from the index. The index value
 * is parsed from a value in the query string of the current URL. Note: this function is to be called independently
 * in the detail document to invoke this function on page load.
 *
 * @param index		the index position of the animal a detail document should be built for.
 */
function buildDetail(index) {
	let animal = animals[index];

	/* set the document title to include the animal name */
	document.title = `${animal.animalName} | Kenton County Animal Adoption`;

	let carouselContainer = document.getElementById('detail-carousel-container');
	carouselContainer.append(buildCarouselElement(animal.animalImages, animal.animalName));

	/* set the about heading text to include the name of the animal */
	let aboutHeading = document.getElementById('about-heading');
	aboutHeading.innerText = `About ${animal.animalName}...`;

	/* append the values of the aboutMeDescription array to the about-description container */
	let aboutDescription = document.getElementById('about-description');
	animal.aboutMeDescription.forEach(value => {
		let paragraph = document.createElement('p');
		paragraph.innerText = value.toString();
		aboutDescription.append(paragraph);
	});

	let generalGrid = document.getElementById('attribute-accordion-general-grid');
	generalGrid.append(buildAccordionAttributeElement('Breed', `${formatBreed(animal.breed, animal.secondBreed)}.`, 'info-circle-fill', 'secondary'));
	generalGrid.append(buildAccordionAttributeElement('Sex', `${animal.sex}.`, 'info-circle-fill', 'secondary'));
	generalGrid.append(buildAccordionAttributeElement('Color', `${formatColor(animal.color)}.`, 'info-circle-fill', 'secondary'));
	generalGrid.append(buildAccordionAttributeElement('Age', `${formatAge(animal.age)}.`, 'info-circle-fill', 'secondary'));
	generalGrid.append(buildAccordionAttributeElement('Size', `${animal.size}.`, 'info-circle-fill', 'secondary'));

	if (animal.sex === 'Male' || animal.sex === 'male') {
		generalGrid.append(buildAccordionAttributeElement('Neutered?', `${formatBoolean(animal.spayedOrNeutered)}.`, 'info-circle-fill', 'secondary'));
	} else if (animal.sex === 'Female' || animal.sex === 'female') {
		generalGrid.append(buildAccordionAttributeElement('Spayed?', `${formatBoolean(animal.spayedOrNeutered)}.`, 'info-circle-fill', 'secondary'));
	}

	if (animal.type === 'Cat' || animal.type === 'cat') {
		generalGrid.append(buildAccordionAttributeElement('Declawed?', `${formatBoolean(animal.declawed)}.`, 'info-circle-fill', 'secondary'));
	}

	let healthGrid = document.getElementById('attribute-accordion-health-grid');
	healthGrid.append(buildHealthAttributeElement('health-check', animal.healthCheck));
	healthGrid.append(buildHealthAttributeElement('vaccination', animal.upToDateVaccinations));
	healthGrid.append(buildHealthAttributeElement('worming', animal.upToDateWorming));
	healthGrid.append(buildHealthAttributeElement('microchip', animal.microchipped));

	let suitabilityGrid = document.getElementById('attribute-accordion-suitability-grid');
	suitabilityGrid.append(buildSuitabilityAttributeElement('children', animal.isSuitableWithChildren));
	suitabilityGrid.append(buildSuitabilityAttributeElement('dog', animal.isOkWithDogs));
	suitabilityGrid.append(buildSuitabilityAttributeElement('cat', animal.likeCats));

	let behaviorGrid = document.getElementById('attribute-accordion-behavior-grid');
	behaviorGrid.append(buildBehaviorAttributeElement('laid-back', animal.isLaidBack));
	behaviorGrid.append(buildBehaviorAttributeElement('shy', animal.isShy));
	behaviorGrid.append(buildBehaviorAttributeElement('special-need', animal.isSpecialNeeds));
	behaviorGrid.append(buildBehaviorAttributeElement('foster-care', animal.inFosterCase));

	let adopt = document.getElementById('adopt');

	let adoptParagraph = document.createElement('p');
	adoptParagraph.setAttribute('class', 'py-1');
	adoptParagraph.innerText = `${animal.animalName} can be adopted by contacting the facility they are being housed at - ${animal.dogLocation} - and mentioning their name, ${animal.animalName}, and ID, ${animal.animalID}. Please feel free to visit or contact this location: 
								
								${animal.dogLocation}
								${animal.contactPhone}
								${animal.contactStreetAddress}
								${animal.contactCity}, ${animal.contactState}, ${animal.contactZip}
								
								Unfortunately we cannot put animals on hold over the phone, nor can we ensure that the animal will still be available when you arrive. This website is updated as frequently as possible, but there is a chance that another party may already be inquiring or in the process of adopting the animal you are interested in seeing.`;
	adopt.append(adoptParagraph);
}

/**
 * Build a Bootstrap 'card' element to be appended to the parent container in the index document.
 *
 * @param animal	the object from the dataset to retrieve data from.
 * @param index		the index of the animal object from the dataset.
 *
 * @returns {HTMLDivElement}	a Bootstrap 'card' element for the index document.
 */
function buildIndexCardElement(animal, index) {
	let col = buildColElement();
	let card = buildCardElement();
	let image = buildCardImageElement(animal.animalImages[0], animal.animalName);
	let body = buildCardBodyElement();
	let title = buildCardTitleHeading(animal.animalName);
	let subtitle = buildCardSubtitleHeading(animal.sex + ', ' + animal.breed);
	let text;

	if (animal.age === 'Adult') {
		text = buildCardTextElement(`${animal.animalName} is an adult ${animal.sex.toLowerCase()} ${formatBreed(animal.breed, animal.secondBreed)}, and ${formatColor(animal.color).toLowerCase()} in color.`);
	} else {
		text = buildCardTextElement(`${animal.animalName} is a ${animal.sex.toLowerCase()} ${formatBreed(animal.breed, animal.secondBreed)}, ${formatAge(animal.age).toLowerCase()} in age, and ${formatColor(animal.color).toLowerCase()} in color.`);
	}

	let button = buildCardButtonElement('Learn More', 'detail.html?index=' + index);

	body.append(title, subtitle, text, button);
	card.append(image, body);
	col.append(card);

	return col;
}

/**
 * Build a flexible Bootstrap column ('col') container element.
 *
 * @returns {HTMLDivElement}	a Bootstrap 'col' element.
 */
function buildColElement() {
	let col = document.createElement('div');

	col.setAttribute('class', 'col');

	return col;
}

/**
 * Build a flexible Bootstrap 'card' container element.
 *
 * @returns {HTMLDivElement}	a Bootstrap 'card' element.
 */
function buildCardElement() {
	let card = document.createElement('div');

	card.setAttribute('class', 'card h-100');

	return card;
}

/**
 * Build an img element to be appended to the top of a Bootstrap 'card' element.
 *
 * @param src	a path to the source image.
 * @param alt	an alternative text for the image that is displayed if the image cannot be.
 *
 * @returns {HTMLImageElement}	an img element to be appended to the top of a Bootstrap 'card' element.
 */
function buildCardImageElement(src, alt) {
	let img = document.createElement('img');

	img.setAttribute('class', 'card-img-top');
	img.setAttribute('src', src);
	img.setAttribute('alt', alt);

	return img;
}

/**
 * Build a flexible Bootstrap 'card-body' element to be appended to a Bootstrap 'card' element.
 *
 * @returns {HTMLDivElement}	a Bootstrap 'card-body' element.
 */
function buildCardBodyElement() {
	let body = document.createElement('div');

	body.setAttribute('class', 'card-body d-flex flex-column');

	return body;
}

/**
 * Build a Bootstrap 'card-title' heading to be appended to a Bootstrap 'card-body' element.
 *
 * @param value		the inner text value of the heading.
 *
 * @returns {HTMLHeadingElement}	a Bootstrap 'card-title' heading.
 */
function buildCardTitleHeading(value) {
	let title = document.createElement('h5');

	title.setAttribute('class', 'card-title');
	title.innerText = value;

	return title;
}

/**
 * Build a Bootstrap 'card-subtitle' heading to be appended to a Bootstrap 'card-body' element.
 *
 * @param value		the inner text value of the heading.
 *
 * @returns {HTMLHeadingElement}	a Bootstrap 'card-subtitle' heading.
 */
function buildCardSubtitleHeading(value) {
	let subtitle = document.createElement('h6');

	subtitle.setAttribute('class', 'card-subtitle text-muted mb-1');
	subtitle.innerText = value;

	return subtitle;
}

/**
 * Build a Bootstrap 'card-text' element to be appended to a Bootstrap 'card-body' element.
 *
 * @param value		the inner text value of the element.
 *
 * @returns {HTMLParagraphElement}	a Bootstrap 'card-text' element.
 */
function buildCardTextElement(value) {
	let text = document.createElement('p');

	text.setAttribute('class', 'card-text');
	text.innerText = value;

	return text;
}

/**
 * Build a full-width Bootstrap 'btn' button to be appended to a Bootstrap 'card-body' element.
 *
 * @param value		the inner text value of the button.
 * @param href		the URL that the button should link to when clicked.
 *
 * @returns {HTMLAnchorElement}		a Bootstrap 'btn' button.
 */
function buildCardButtonElement(value, href) {
	let button = document.createElement('a');

	button.setAttribute('class', 'btn btn-primary col-12 mt-auto');
	button.setAttribute('href', href);
	button.innerText = value;

	return button;
}

/**
 * Build a Bootstrap carousel element with indicator and direction control elements.
 *
 * @param images	the links to images that should be displayed in this carousel.
 * @param name		the name of the animal for which the carousel is being generated.
 *
 * @returns {HTMLDivElement}	a Bootstrap carousel element.
 */
function buildCarouselElement(images, name) {
	let id = `carousel-${name.toLowerCase()}`;

	let carousel = document.createElement('div');
	carousel.setAttribute('class', 'carousel slide h-100');
	carousel.setAttribute('id', id);
	carousel.setAttribute('data-bs-ride', 'carousel');

	let indicators = document.createElement('div');
	indicators.setAttribute('class', 'carousel-indicators');

	images.forEach((image, index) => {
		let indicator = document.createElement('button');
		indicator.setAttribute('type', 'button');
		indicator.setAttribute('data-bs-target', `#${id}`);
		indicator.setAttribute('data-bs-slide-to', `${index}`);
		indicator.setAttribute('aria-label', `${name} ${index + 1}`);

		if (index === 0) {indicator.setAttribute('class', 'active');
			indicator.setAttribute('aria-current', 'true');
		}

		indicators.append(indicator);
	});

	let inner = document.createElement('div');
	inner.setAttribute('class', 'carousel-inner h-100');

	images.forEach((image, index) => {
		let item = document.createElement('div');

		if (index === 0) {
			item.setAttribute('class', 'carousel-item active h-100');
		} else {
			item.setAttribute('class', 'carousel-item h-100');
		}

		let img = document.createElement('img');
		img.setAttribute('class', 'd-block w-100 h-100');
		img.setAttribute('src', image);
		img.setAttribute('alt', `${name} ${index + 1}`);

		item.append(img);
		inner.append(item);
	});

	let prev = buildCarouselControlElement('prev', id);
	let next = buildCarouselControlElement('next', id);

	carousel.append(indicators, inner, prev, next);

	return carousel;
}

/**
 * Build the three Bootstrap carousel control elements: a button, an icon, and descriptive text.
 *
 * @param direction		the direction that the control should be designed for; either 'previous' or 'next'.
 * @param id			the 'id' attribute of the carousel that these elements should control.
 *
 * @returns {HTMLButtonElement}		the Bootstrap carousel control element.
 */
function buildCarouselControlElement(direction, id) {
	let control = document.createElement('button');
	let icon = document.createElement('span');
	let text = document.createElement('span');

	control.setAttribute('type', 'button');
	control.setAttribute('data-bs-target', `#${id}`);

	icon.setAttribute('aria-hidden', 'true');

	text.setAttribute('class', 'visually-hidden');

	if (direction === 'prev') {
		control.setAttribute('class', 'carousel-control-prev');
		control.setAttribute('data-bs-slide', 'prev');

		icon.setAttribute('class', 'carousel-control-prev-icon');

		text.innerText = 'Previous';

	} else if (direction === 'next') {
		control.setAttribute('class', 'carousel-control-next');
		control.setAttribute('data-bs-slide', 'next');

		icon.setAttribute('class', 'carousel-control-next-icon');

		text.innerText = 'Next';
	}

	control.append(icon, text);

	return control;
}

/**
 * Build a Bootstrap 'card' element to be appended to an accordion grid container element within the detail document,
 * styled with appropriate [color]{@link https://getbootstrap.com/docs/5.1/customize/color/} and
 * [icon]{@link https://icons.getbootstrap.com/} attributes.
 *
 * @param attribute		a semantic name of the attribute as it is represented in the dataset.
 * @param description	a short description of the relationship between the attribute and the attribute value.
 * @param icon			an icon name based on the BI webfont <strong>without</strong> the 'bi-' prefix.
 * @param color			a color name based on the current Bootstrap theme color palette <strong>without</strong> the
 * 						'bg-' prefix.
 *
 * @returns {HTMLDivElement}	a Bootstrap 'card' element for the detail document.
 */
function buildAccordionAttributeElement(attribute, description, icon, color) {
	let col = buildColElement();
	let card = buildCardElement();
	let body = buildCardBodyElement();

	let badgeContainer = document.createElement('h3');

	let badge = document.createElement('span');
	badge.setAttribute('class', `badge bg-${color} text-start w-100`);

	let badgeIcon = document.createElement('i');
	badgeIcon.setAttribute('class', `bi bi-${icon}`);

	let badgeAttribute = document.createElement('span');
	badgeAttribute.innerText = ` ${attribute}`;

	let attributeDescription = document.createElement('p');
	attributeDescription.setAttribute('class', 'body-text mx-1 mb-0');
	attributeDescription.innerText = description;

	badge.append(badgeIcon, badgeAttribute);
	badgeContainer.append(badge);
	body.append(badgeContainer, attributeDescription);
	card.append(body);
	col.append(card);

	return col;
}

/**
 * Build a Bootstrap 'card' element to be appended to the attribute accordion health grid within the detail document.
 *
 * @param attribute		the name of the attribute to use in the switch statement; e.g., 'health-check', 'vaccination',
 * 						'worming', or 'microchip'.
 * @param value			the value - true or false - of the data attribute.
 *
 * @returns {HTMLDivElement}	a Bootstrap 'card' element to be appended to the attribute accordion health grid.
 */
function buildHealthAttributeElement(attribute, value) {
	let element;

	switch (attribute) {
		case 'health-check':
			value === true ?
				element = buildAccordionAttributeElement('Health Check', attributeDescription.healthCheckTrue, 'check-circle-fill', 'success') :
				element = buildAccordionAttributeElement('Health Check', attributeDescription.healthCheckFalse, 'x-circle-fill', 'danger'); break;

		case 'vaccination':
			value === true ?
				element = buildAccordionAttributeElement('Vaccination', attributeDescription.vaccinationTrue, 'check-circle-fill', 'success') :
				element = buildAccordionAttributeElement('Vaccination', attributeDescription.vaccinationFalse, 'x-circle-fill', 'danger'); break;

		case 'worming':
			value === true ?
				element = buildAccordionAttributeElement('Worming', attributeDescription.wormingTrue, 'check-circle-fill', 'success') :
				element = buildAccordionAttributeElement('Worming', attributeDescription.wormingFalse, 'x-circle-fill', 'danger'); break;

		case 'microchip':
			value === true ?
				element = buildAccordionAttributeElement('Microchip', attributeDescription.microchipTrue, 'check-circle-fill', 'success') :
				element = buildAccordionAttributeElement('Microchip', attributeDescription.microchipFalse, 'x-circle-fill', 'danger'); break;
	}

	return element;
}

/**
 * Build a Bootstrap 'card' element to be appended to the attribute accordion suitability grid within the detail
 * document.
 *
 * @param attribute		the name of the attribute for use in the switch statement; e.g., 'children', 'dog', or 'cat'.
 * @param value			the value - true or false - of the data attribute.
 *
 * @returns {HTMLDivElement}	a Bootstrap 'card' element to be appended to the attribute accordion suitability grid.
 */
function buildSuitabilityAttributeElement(attribute, value) {
	let element;

	/* if the attribute value is null, meaning no value was assigned, build an empty element with 'display: none' */
	if (value === null) {
		element = document.createElement('div');
		element.setAttribute('style', 'display: none');

		return element;
	}

	switch (attribute) {
		case 'children':
			value === true ?
				element = buildAccordionAttributeElement('Children', attributeDescription.suitableChildrenTrue, 'heart-half', 'primary') :
				element = buildAccordionAttributeElement('Children', attributeDescription.suitableChildrenFalse, 'heart-fill', 'warning'); break;

		case 'dog':
			value === true ?
				element = buildAccordionAttributeElement('Dogs', attributeDescription.suitableDogTrue, 'heart-half', 'primary') :
				element = buildAccordionAttributeElement('Dogs', attributeDescription.suitableDogFalse, 'heart-fill', 'warning'); break;

		case 'cat':
			value === true ?
				element = buildAccordionAttributeElement('Cats', attributeDescription.suitableCatTrue, 'heart-half', 'primary') :
				element = buildAccordionAttributeElement('Cats', attributeDescription.suitableCatFalse, 'heart-fill', 'warning'); break;
	}

	return element;
}

/**
 * Build a Bootstrap 'card' element to be appended to the attribute accordion behavior grid within the detail
 * document.
 *
 * @param attribute		the name of the attribute for use in the switch statement; e.g., 'laid-back', 'shy',
 * 						'special-need', or 'foster-care'.
 * @param value			the value - true or false - of the data attribute.
 *
 * @returns {HTMLDivElement}	a Bootstrap 'card' element to be appended to the attribute accordion behavior grid.
 */
function buildBehaviorAttributeElement(attribute, value) {
	let element;

	/* if the attribute value is null, meaning no value was assigned, build an empty element with 'display: none' */
	if (value === null) {
		element = document.createElement('div');
		element.setAttribute('style', 'display: none');

		return element;
	}

	switch (attribute) {
		case 'laid-back':
			value === true ?
				element = buildAccordionAttributeElement('Laid Back', attributeDescription.laidBackTrue, 'activity', 'primary') :
				element = buildAccordionAttributeElement('Laid Back', attributeDescription.laidBackFalse, 'activity', 'primary'); break;

		case 'shy':
			value === true ?
				element = buildAccordionAttributeElement('Shy', attributeDescription.shyTrue, 'heart-fill', 'primary') :
				element = buildAccordionAttributeElement('Shy', attributeDescription.shyFalse, 'hearts', 'primary'); break;

		case 'special-need':
			value === true ?
				element = buildAccordionAttributeElement('Special Needs', attributeDescription.specialNeedsTrue, 'eye-fill', 'primary') :
				element = buildAccordionAttributeElement('Special Needs', attributeDescription.specialNeedsFalse, 'eye-slash-fill', 'primary'); break;

		case 'foster-care':
			value === true ?
				element = buildAccordionAttributeElement('Foster Care', attributeDescription.fosterCareTrue, 'house-heart-fill', 'primary') :
				element = buildAccordionAttributeElement('Foster Care', attributeDescription.fosterCareFalse, 'house-heart-fill', 'primary'); break;
	}

	return element;
}

/**
 * Format and calculate the age attribute for display through a short series of steps: return an undefined age string
 * if the provided age is invalid or a calculated approximation of age in months or years, depending on the age value.
 *
 * @param age	the age of the animal.
 *
 * @returns {string}	the formatted and calculated age approximation.
 */
function formatAge(age) {
	/* if the age provided is invalid, return a string representing 'undefined' */
	if (age.length === 0) {
		return 'Unknown or not provided.';
	}

	/* define day variable to calculate total age */
	let day = 0;

	/* split age on space character */
	let split = age.split(' ');

	/* iterate through each measurement and parse year, month, and week values */
	split.forEach((measurement) => {
		if (measurement.includes('Yrs')) {
			day += (parseInt(measurement) * 365);
		}

		if (measurement.includes('Mths')) {
			day += (parseInt(measurement) * 30);
		}

		if (measurement.includes('Wks')) {
			day += (parseInt(measurement) * 7);
		}
	});

	let year = day / 365;

	if (year < 1) {
		return `Approximately ${Math.round(day / 30)} months`;
	}

	if (year < 2) {
		return `Approximately ${Math.round(day / 365)} year`;
	}

	return `Approximately ${Math.round(day / 365)} years`;
}

/**
 * Format a boolean value for display purposes to return 'Yes' if true and 'No' if false.
 *
 * @param value		the boolean value to format.
 *
 * @returns {string}	the 'formatted' string representation of the boolean value.
 */
function formatBoolean(value) {
	return value === true ? 'Yes' : 'No';
}

/**
 * Format and concatenate the primary and secondary breed attributes for display through a short series of steps:
 * return an undefined breed string if neither attribute is valid or a trimmed concatenation of the primary and
 * secondary breeds, should they exist. Additionally, change the case of words unrelated to the proper names of the
 * breed.
 *
 * @param primary		the primary breed of the animal.
 * @param secondary		the secondary breed of the animal.
 *
 * @returns {string}	the formatted and concatenated breed attribute.
 */
function formatBreed(primary, secondary) {
	/* if neither breed provided contains a valid value, return a string representing 'undefined' */
	if (primary.length === 0 && secondary.length === 0) {
		return 'Unknown or not provided.';
	}

	let result = '';

	/* if primary breed is provided and valid, format and concatenate with the result */
	if (primary.length > 0) {
		let primarySplit = primary.split(' ');

		primarySplit.forEach((word) => {
			if (word === 'Cross') {
				word = word.toLowerCase();
			}

			result += `${word} `;
		});
	}

	/* if secondary breed is provided and valid, format and concatenate with result */
	if (secondary.length > 0) {
		/* first, add 'and ' to the concatenated result string */
		result += 'and ';

		let secondarySplit = secondary.split(' ');

		secondarySplit.forEach((word) => {
			if (word === 'Cross') {
				word = word.toLowerCase();
			}

			result += `${word} `;
		});
	}

	return result.trim();
}

/**
 * Format and concatenate the color attribute values for display through a short series of steps: return an undefined
 * color string if the attribute value is not valid or the color(s) with proper grammar and punctuation, should
 * multiple exist.
 *
 * @param color		the color of the animal.
 *
 * @returns {string}	the formatted and concatenated color attribute.
 */
function formatColor(color) {
	/* if the color provided is invalid, return a string representing 'undefined' */
	if (color.length === 0) {
		return 'Unknown or not provided.';
	}

	/* split the color value on '/' and store each element */
	let colors = color.split('/');

	/* if there is only one color, return it immediately */
	if (colors.length === 1) {
		return colors[0].trim();
	}

	/* if there are two colors, return a concatenation of the two */
	if (colors.length === 2) {
		return colors[0].trim() + ' and ' + colors[1].trim().toLowerCase();
	}

	/* initialise an empty string to store the result */
	let result = '';

	/* if there are more than two colors, return a concatenation of them with proper grammar and punctuation */
	colors.forEach((value, index) => {
		if (index < colors.length - 1) {
			if (index === 0) {
				result += value.trim() + ', ';
			} else {
				result += value.trim().toLowerCase() + ', ';
			}
		} else {
			result = result.trim() + ' and ' + value.trim();
		}
	});

	/* return the concatenated result */
	return result;
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