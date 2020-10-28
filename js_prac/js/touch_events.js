//FOR MOBILE

// touchstart - касание к елементу
// touchmove - палец при косании к елементу начинает двигаться
// touchend - палец оторвался от елемента
// touchenter - ведем пальцем по экрану и наскальзываем на елемент
// touchleave - продолжил куда-то скользить и ушел за пределы елемента
// touchcancel - точка соприкосновения не регистрируется на утройстве

window.addEventListener('DOMContentLoaded', () => {
    const box = document.querySelector('#box');

    box.addEventListener('touchstart', (e)=>{
        e.preventDefault();
        console.log('touchstart');
        // console.log(e.touches);
        console.log(e.targetTouches);
    });

    box.addEventListener('touchmove', (e)=>{
        e.preventDefault();
        console.log('touchmove');

        //example for slider
        console.log(e.targetTouches[0].pageX);
    });

    box.addEventListener('touchend', (e)=>{
        e.preventDefault();
        console.log('touchend');
    });
});

// свойства: touches - все пальцы, которые взаимодействуют с экраном
// targetTouches - все пальцы, которые взаимодействуют с конкретным ел.
// changedTouches - список пальцев, которые участвуют в текущем событии. Будет покозывать палец, который убрали
//ex: e.touches // e.targetTouches // e.changedTouches