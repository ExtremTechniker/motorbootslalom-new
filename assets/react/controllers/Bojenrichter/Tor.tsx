import React, { Component } from 'react';
import Boje from "./Boje";

export interface TorProps {
    direction: string
    num: string
    states: {
        [key: string]: -1 | 0 | 1
    }
}

export default class Tor extends Component<TorProps> {

    render() {
        const left = `${this.props.direction}_T${this.props.num}_l`;
        const right = `${this.props.direction}_T${this.props.num}_r`;
        return (
            <div className="tor" id={`t${this.props.num}`}>
                <div className="boje_l">

                    <Boje id={left} state={this.props.states[left]}/>
                </div>
                <div className="boje_r">
                    <Boje id={right} state={this.props.states[right]}/>
                </div>
            </div>
        );
    }


}