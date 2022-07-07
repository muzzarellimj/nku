const { readFileSync } = require('fs');

const express = require('express');
const router = express.Router();

router.get('/create', (request, response) => {
	response.status(200).send(readFileSync('./src/users/create.html', 'utf8'));
});

router.get('/:id', (request, response) => {
	response.status(200).send(readFileSync('./src/users/detail.html', 'utf8'));
});

router.get('/:id/edit', (request, response) => {
	response.status(200).send(readFileSync('./src/users/edit.html', 'utf8'));
});

router.get('/:id/delete', (request, response) => {
	response.status(200).send(readFileSync('./src/users/delete.html', 'utf8'));
});

module.exports = router;