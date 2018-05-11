@include('parts/header')


<main>
    <script type="text/x-handlebars" data-template-name="todos">
        <div class="content">
            <section id="todoapp">

                <div class="top">
                    <div class="bar">
                        <h1>משימות</h1>
                        <button type="button" class="toggle-input" @{{ action "toggleCreationInput" }} >
                            @{{#if creationOpen}} X @{{else}} + @{{/if}}
                        </button>
                    </div>
                    @{{#if creationOpen}}
                    <div class="add-todos">
                        @{{input type="text" id="new_todo" placeholder="המשימה" value=newTitle action="createTodo"}}
                    </div>
                    @{{/if}}
                </div>


                <div class="list-wrapper">

                    <ol id="todo_list">
                        @{{#each todo in model itemController="todo" }}

                        <li @{{bind-attr class="todo.completed:completed todo.isEditing:editing" }}>

                            <div class="right">
                                <label @{{bind-attr class=":checkbox-label todo.completed:checked" }} title="toggle status">
                                    @{{input type="checkbox" checked=todo.completed class="toggle" }}
                                </label>
                                @{{#if todo.isEditing}}
                                @{{edit-todo class="edit" value=todo.title focus-out="acceptChanges" insert-newline="acceptChanges"}}
                                @{{else}}
                                <label @{{action "editTodo" on="doubleClick" }} class="title"
                                       title="double click to edit">
                                    @{{todo.title}}
                                </label>
                                @{{/if}}
                            </div>

                            <div class="left">
                                <button @{{action "removeTodo"}} @{{bind-attr class=":destroy todo.isEditing:hidden" }}
                                        type="button" title="delete">X
                                </button>
                            </div>

                        </li>
                        @{{/each}}
                    </ol>

                </div>


                <div class="bottom">
                    <ul>
                        <li>לסיום: <strong>@{{ remaining }}</strong></li>
                        <li>הושלמו: <strong>@{{ completed }}</strong></li>
                        <li>סה"כ: <strong>@{{ total }}</strong></li>
                    </ul>
                </div>

            </section>
        </div>


    </script>
</main>

@include('parts/footer')