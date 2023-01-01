const cols = document.getElementsByClassName('board');
const tasks = document.getElementsByClassName('tarefas');

for (const col of cols){
    new Sortable(col, {
        handle: '.vertical',
        group : 'board',
    });
}

for (const task of tasks) {
    new Sortable(task, {
        handle: '.task-container',
        group : 'tarefas',

        onEnd: function (evt) {
            const task = evt.item
            const task_id = task.getAttribute('data-id')
            const vertical = task.parentElement
            const vertical_id = vertical.getAttribute('data-id')
            url = new URL(SERVER + '/api/task/set_col')
            fetch(url.toString(), {
                method: 'POST',
                headers: {
                    'Accept': 'application:json',
                    'Content-Type': 'application:json'
                },
                body: JSON.stringify({
                    id: task_id,
                    vertical_id: vertical_id
                })
            })
        }
    });
}
