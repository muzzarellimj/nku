# Assignment Three: A JavaScript-powered Website

View the most recent published (publicly committed) content 
[here](https://muzzarellimj.github.io/full-stack-application-development/assignment/assignment-3/). 

## Assignment Guidelines
Our task in this assignment is to redesign a selection of the Kenton County Animal Shelter's 'adoptable animals'
webpages, the initial data of which can be found on Canvas. The goal is to create two HTML templates, index.html and
detail.html, that use JavaScript to display the information shown in the existing webpages. This can be completed by...
1. creating a JavaScript array of objects in which each object contains all the information of a pet, including images.
2. incorporate the JavaScript array into both HTML templates.
3. in the index template, use a loop for displaying the correct content; each pet will link to a dynamically generated
   detail page, `detail.html?index=x`, where `x` is equal to the index of the element in the array.
4. in the detail template, use the query string `index=x` to determine which pet you are going to show on the webpage,
   retrieve the data from the JavaScript array, and display it on the generated webpage.

## Division of Labor
As discussed at our last meet, we have divided the labor up approximately equally in preparation for our next meet:

### MJ
Tackle the logic behind retrieving data from the array based on the index value from the query string and passing that
data to the detail page. Caporusso mentioned that we **can** use elements with ID attributes in our template code,
and has provided a function to pull data from the query string.

### Michael
Tackle the logic behind generating card (or similar) elements to be appended to the index template. Caporusso mentioned
that we **can** hardcode a flex container with an ID attribute in our index template and append generated elements to it.

### Hanibal
Build the detail.html template with text elements that have ID attributes whose names match Robert's data. For example,
there are attributes in Robert's array named animalName, type, and breed. I think the best way to go about structuring
the elements that the data will be housed in would be a `<div>` element with a class attribute we can structure each
piece of data together more easily in the end. Here is something like how that could look...

```html
<body>
    <div class="animal-attribute">
        <a class="animal-attribute-text" id="animalName"></a>
    </div>
    
    <div class="animal-attribute">
        <a class="animal-attribute-text" id="type"></a>
    </div>
    
    <div class="animal-attribute">
        <a class="animal-attribute-text" id="breed"></a>
    </div>
</body>
```

This structure will be nearly identical throughout the entire document, but there will be a couple of data attributes
that will need to be structured differently: animalImages and aboutMeDescription. I think the best way to handle these
elements would be to create a 'container' element rather than a text element that has an ID attribute which we can grab
and append to, like this:

```html
<body>
    <div class="animal-attribute">
        <div class="animal-attribute-container" id="animalImages"></div>
    </div>
    
    <div class="animal-attribute">
        <div class="animal-attribute-container" id="aboutMeDescription"></div>
    </div>
</body>
```

The class attribute naming here is totally arbitrary so feel free to adjust as necessary. I would take a look at
Robert's array (file in the Teams chat, uploaded here soon) and write each element in the order that Robert's data is
presented in.

### Robert
~~Transcribe the data from the included PDF files to a JSON array~~ and help MJ and Michael out with the logic as
necessary.

## Rubric
This assignment is graded positively on the following elements:
- use only two pages, index.html and detail.html: 2 points
- use JavaScript to display information about the pets, i.e., no data can be hardcoded in the HTML: 2 points
- properly retrieve information in detail.html using the query string: 2 points
- use Bootstrap (**and we double-checked this time**) to improve the visualization of the page: 1 point
- publish using GitHub pages: 1 point

## Submission
Submission seems simple this time around, but I am going to ask Dr. Caporusso for clarification: the assignment page
on Canvas says only to submit a ZIP file containing our work, but I assume we should rather submit the link to the
GitHub pages publication. I'll update this doc accordingly when I get an answer one way or the other.