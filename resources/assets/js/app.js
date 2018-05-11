
// global
window.Todos = Ember.Application.create({
    rootElement: "main"
});

Todos.ApplicationStore = DS.Store.extend({
    adapter: DS.RESTAdapter
});

let router  = require('./router');
let todos = require('./models/todos');
let todosController = require('./controllers/todos_controller');
let todoController = require('./controllers/todo_controller');
let editTodoView = require('./views/edit_todo_view');