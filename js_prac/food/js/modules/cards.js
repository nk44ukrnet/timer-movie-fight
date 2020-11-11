import {getResource} from "../services/services";

function cards() {
    const menuField = document.querySelector('.menu__field .container');

    class MenuesClass {
        constructor(img, title, desc, price, append, transfer = 1, ...classes) {
            this.img = img;
            this.title = title;
            this.desc = desc;
            this.price = price;
            this.append = append;
            this.transfer = transfer;
            this.classes = classes;

            this.changeToUAH();
            this.insertToThePage();
        }

        changeToUAH() {
            this.price = this.price * this.transfer;
        }

        insertToThePage() {
            this.append.innerHTML += `
            <div class="menu__item">
            <img src="${this.img}" alt="${this.title}">
            <h3 class="menu__item-subtitle">${this.title}</h3>
            <div class="menu__item-descr">${this.desc}</div>
            <div class="menu__item-divider"></div>
            <div class="menu__item-price">
            <div class="menu__item-cost">Ціна:</div>
            <div class="menu__item-total"><span>${this.price}</span> грн/день</div>
            </div>
            </div>
            `;
        }
    }



    axios.get('http://localhost:3000/menu')
        .then(data => {
            data.data.forEach(({img, title, descr, price}) => {
                new MenuesClass(img, title, descr, price, menuField);
            });
        });
}

export default cards;