# Software Architecture

The following software architecture considers the process by which data is converted from JSON (and the rendered HTML) 
to PDF in a checklist web application. 

- input: a variable number of checklist items, which are stored in JSON in our database and rendered as HTML.

- output: a downloadable, printable PDF that renders only checklist items and ignores all other elements.

- process: because there does not exist an actively maintained package to convert directly from JSON to PDF, and since 
  the application will also support conversion to Markdown, the process will be completed in two steps: conversion from 
  JSON to Markdown with [markdown-json](https://www.npmjs.com/package/markdown-json); and conversion from Markdown to 
  PDF with [md-to-pdf](https://www.npmjs.com/package/md-to-pdf). The final result will then be automatically downloaded 
  on the client.

![software architecture via lucidchart](https://i.imgur.com/pGknITP.png)