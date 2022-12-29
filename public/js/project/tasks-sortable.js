const cols = document.getElementsByClassName('board');
const tasks = document.getElementsByClassName('tareas');

console.log('tou aqui');

for (const col of cols){
    new Sortable(col, {
        handle: '.vertical',
        group : 'board',
    });
}

for (const task of tasks){
    new Sortable(task, {
        handle: '.task-container',
        group : 'tareas',
    });
}
