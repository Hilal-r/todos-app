Todos.TodoController = Ember.ObjectController.extend({
    completed: function (key, value) {

        let todo = this.get('model');

        if (value === undefined) {
            // property being used as a getter
            return todo.get('completed');
        } else {

            todo.set('completed', value);
            todo.save();
            return value;
        }

    }.property('todo.completed'),
    actions: {
        editTodo: function () {
            this.set('isEditing', true);
        },
        acceptChanges: function (value) {

            let todo = this.get('model');
            let that = this;

            if (Ember.isEmpty(this.get('model.title'))) {
                // must have value
                return;

            } else {
                this.set('title', value);
                todo.save().then(function(response) {
                    var meta = that.store.metadataFor("todo");
                    // access meta data from server
                    console.log(meta);

                });
            }
            this.set('newTitle', '');
            this.set('isEditing', false);

        },
        removeTodo: function () {
            let todo = this.get('model');
            todo.deleteRecord();
            todo.save();
        }
    },

    isEditing: false,

});