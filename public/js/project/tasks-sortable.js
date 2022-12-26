const tasks = document.getElementsByClassName('tareas');
console.log('tou aqui');

for (const task of tasks){
    new Sortable(task, {
        handle: '.fa-grip-lines',
        group : 'tareas',
    });
}
