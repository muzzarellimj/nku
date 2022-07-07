require('dotenv').config();

const { readFileSync } = require('fs');

const bodyParser = require('body-parser');
const open = require('open');

const express = require('express');
const app = express();

const database = require('./database');

// middleware
app.use(bodyParser.json());

// external routing
const userWebRouter = require('./users/routerWeb');
const userApiRouter = require('./users/routerAPI');

app.use('/users', userWebRouter);
app.use('/api/users', userApiRouter);

app.get('/', (request, response) => {
	response.status(200).send(readFileSync('./src/users/index.html', 'utf8'));
});

database.connect(() => {
	app.listen(process.env.PORT, async () => {
		console.log(`Application listening on port ${process.env.PORT}.`)

		await open(`http://localhost:${process.env.PORT}`);
	});
});