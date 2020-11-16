import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import './index.css';

// import App from './components/app/';

class WhoAmI extends Component {
    constructor(props) {
        super(props);
        this.state = {
            years: 26,
            nationality: 'uk'
        }
        this.nextYear = this.nextYear.bind(this);
    }
    nextYear(){
        this.setState(state=>({
            years: ++state.years
        }));
    }
    render() {
        const {name, surname, link} = this.props;
        const {years} = this.state;
        return (
            <>
                <button onClick={this.nextYear}>++</button>
                <h1>My name is {name}, surname - {surname}, years = {years}</h1>
                <a href={link}>My profile {link}</a>
            </>
        )
    }
}

const All = () => {
    return (
        <>
            <WhoAmI name="John" surname="Smith" link="google.com"/>
            <WhoAmI name="Dev" surname="Tools" link="google2.com"/>
            <WhoAmI name="Dath" surname="Zoom" link="google3.com"/>
        </>
    )
}

// ReactDOM.render(<App/>, document.getElementById('root'));
ReactDOM.render(<All/>, document.getElementById('root'));


