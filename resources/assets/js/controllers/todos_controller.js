Todos.TodosController = Ember.ArrayController.extend({
    actions: {
        toggleCreationInput: function () {
            this.set('creationOpen', !this.creationOpen);

        },
        createTodo: function () {

            let title = this.get('newTitle');
            // stop if title is empty
            if (!title.trim()) {
                return;
            }

            let todo = this.store.createRecord('todo', {
                title: title,
                completed: false
            });

            this.set('newTitle', '');
            this.set('creationOpen', false);

            let that = this;

            todo.save().then(function (response) {

                let meta = that.store.metadataFor("todo");
                console.log(meta);

                todo.set('id', response.get('id'));

            }).catch(function (error) {
                // Delete from local cache
                todo.deleteRecord();
            });


        }
    },

    creationOpen: false,

    remaining: function () {
        return this.filterBy('completed', false).get('length');
    }.property('@each.completed'),

    completed: function () {
        return this.filterBy('completed', true).get('length');
    }.property('@each.isCompleted'),

    total: function () {
        return this.get('length');
    }.property('@each.title'),

});
