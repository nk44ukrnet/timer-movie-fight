import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './components/app/app';

class WhoAmI extends React.Component {
    // constructor(props) {
    //     super(props);
    //     this.state = {
    //         years: 26,
    //         lang: 'ua'
    //     }
    //     // this.nextYear = this.nextYear.bind(this);
    // /*    this.nextYear = () => {
    //         this.setState(state => ({
    //             years: ++state.years
    //         }))
    //     } */
    // }
    state = {
        years: 27
    }
    nextYear = () => {
        this.setState(state => ({
            years: ++state.years
        }))
    }


    // nextYear(){
    //     this.setState(state => ({
    //         years: ++state.years
    //     }))
    // }

    render() {
        const {name, surname, link} = this.props;
        const {years} = this.state;
        return (
            <>
                <button onClick={this.nextYear}>++</button>
                <h1>Name: {name}, surname - {surname}, years- {years}</h1>
                <a href="{link}">{link}</a>
            </>
        )
    }
}

const All = () => {
    return (
        <>
            <WhoAmI name="name1" surname="surname1" link="https://fb.com"/>
            <WhoAmI name="name2" surname="surname2" link="https://inv.ua"/>
            <WhoAmI name="name3" surname="surname3" link="https://cdnjs.org"/>
        </>
    )
}

// ReactDOM.render(<WhoAmI name="TYPE:NAME" surname="TYPE:SURNAME"
//                         link="https://google.com"/>, document.getElementById('root'));
ReactDOM.render(<All/>, document.getElementById('root'))
// ReactDOM.render(<App/>, document.getElementById('root'));

