/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
function addEventListeners() {
  var itemCheckers = document.querySelectorAll('article.card li.item input[type=checkbox]');
  [].forEach.call(itemCheckers, function (checker) {
    checker.addEventListener('change', sendItemUpdateRequest);
  });
  var itemCreators = document.querySelectorAll('article.card form.new_item');
  [].forEach.call(itemCreators, function (creator) {
    creator.addEventListener('submit', sendCreateItemRequest);
  });
  var itemDeleters = document.querySelectorAll('article.card li a.delete');
  [].forEach.call(itemDeleters, function (deleter) {
    deleter.addEventListener('click', sendDeleteItemRequest);
  });
  var cardDeleters = document.querySelectorAll('article.card header a.delete');
  [].forEach.call(cardDeleters, function (deleter) {
    deleter.addEventListener('click', sendDeleteCardRequest);
  });
  var cardCreator = document.querySelector('article.card form.new_card');
  if (cardCreator != null) cardCreator.addEventListener('submit', sendCreateCardRequest);
}
function encodeForAjax(data) {
  if (data == null) return null;
  return Object.keys(data).map(function (k) {
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]);
  }).join('&');
}
function sendAjaxRequest(method, url, data, handler) {
  var request = new XMLHttpRequest();
  request.open(method, url, true);
  request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.addEventListener('load', handler);
  request.send(encodeForAjax(data));
}
function sendItemUpdateRequest() {
  var item = this.closest('li.item');
  var id = item.getAttribute('data-id');
  var checked = item.querySelector('input[type=checkbox]').checked;
  sendAjaxRequest('post', '/api/item/' + id, {
    done: checked
  }, itemUpdatedHandler);
}
function sendDeleteItemRequest() {
  var id = this.closest('li.item').getAttribute('data-id');
  sendAjaxRequest('delete', '/api/item/' + id, null, itemDeletedHandler);
}
function sendCreateItemRequest(event) {
  var id = this.closest('article').getAttribute('data-id');
  var description = this.querySelector('input[name=description]').value;
  if (description != '') sendAjaxRequest('put', '/api/cards/' + id, {
    description: description
  }, itemAddedHandler);
  event.preventDefault();
}
function sendDeleteCardRequest(event) {
  var id = this.closest('article').getAttribute('data-id');
  sendAjaxRequest('delete', '/api/cards/' + id, null, cardDeletedHandler);
}
function sendCreateCardRequest(event) {
  var name = this.querySelector('input[name=name]').value;
  if (name != '') sendAjaxRequest('put', '/api/cards/', {
    name: name
  }, cardAddedHandler);
  event.preventDefault();
}
function itemUpdatedHandler() {
  var item = JSON.parse(this.responseText);
  var element = document.querySelector('li.item[data-id="' + item.id + '"]');
  var input = element.querySelector('input[type=checkbox]');
  element.checked = item.done == "true";
}
function itemAddedHandler() {
  if (this.status != 200) window.location = '/';
  var item = JSON.parse(this.responseText);

  // Create the new item
  var new_item = createItem(item);

  // Insert the new item
  var card = document.querySelector('article.card[data-id="' + item.card_id + '"]');
  var form = card.querySelector('form.new_item');
  form.previousElementSibling.append(new_item);

  // Reset the new item form
  form.querySelector('[type=text]').value = "";
}
function itemDeletedHandler() {
  if (this.status != 200) window.location = '/';
  var item = JSON.parse(this.responseText);
  var element = document.querySelector('li.item[data-id="' + item.id + '"]');
  element.remove();
}
function cardDeletedHandler() {
  if (this.status != 200) window.location = '/';
  var card = JSON.parse(this.responseText);
  var article = document.querySelector('article.card[data-id="' + card.id + '"]');
  article.remove();
}
function cardAddedHandler() {
  if (this.status != 200) window.location = '/';
  var card = JSON.parse(this.responseText);

  // Create the new card
  var new_card = createCard(card);

  // Reset the new card input
  var form = document.querySelector('article.card form.new_card');
  form.querySelector('[type=text]').value = "";

  // Insert the new card
  var article = form.parentElement;
  var section = article.parentElement;
  section.insertBefore(new_card, article);

  // Focus on adding an item to the new card
  new_card.querySelector('[type=text]').focus();
}
function createCard(card) {
  var new_card = document.createElement('article');
  new_card.classList.add('card');
  new_card.setAttribute('data-id', card.id);
  new_card.innerHTML = "\n\n  <header>\n    <h2><a href=\"cards/".concat(card.id, "\">").concat(card.name, "</a></h2>\n    <a href=\"#\" class=\"delete\">&#10761;</a>\n  </header>\n  <ul></ul>\n  <form class=\"new_item\">\n    <input name=\"description\" type=\"text\">\n  </form>");
  var creator = new_card.querySelector('form.new_item');
  creator.addEventListener('submit', sendCreateItemRequest);
  var deleter = new_card.querySelector('header a.delete');
  deleter.addEventListener('click', sendDeleteCardRequest);
  return new_card;
}
function createItem(item) {
  var new_item = document.createElement('li');
  new_item.classList.add('item');
  new_item.setAttribute('data-id', item.id);
  new_item.innerHTML = "\n  <label>\n    <input type=\"checkbox\"> <span>".concat(item.description, "</span><a href=\"#\" class=\"delete\">&#10761;</a>\n  </label>\n  ");
  new_item.querySelector('input').addEventListener('change', sendItemUpdateRequest);
  new_item.querySelector('a.delete').addEventListener('click', sendDeleteItemRequest);
  return new_item;
}
addEventListeners();
var LOCAL = "http://127.0.0.1:8000";
var PRODUCTION = "https://lbaw2215.lbaw.fe.up.pt";
var SERVER = PRODUCTION;
/******/ })()
;