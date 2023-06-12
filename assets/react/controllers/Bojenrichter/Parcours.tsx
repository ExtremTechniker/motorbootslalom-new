import React, { Component } from 'react';
import Tor from "./Tor";
import Boje from "./Boje";

export interface ParcoursProps {
    buoyStates: {
        [key: string]: -1 | 0 | 1
    }
}

export default class Parcours extends Component<ParcoursProps> {

    render() {
        return (
            <div className="bojenfehler">
                <h1> Bojenfehler </h1>
                <div id="parcours">
                    <div className="parcours" id="hinfahrt">
                        {
                            Array.from(Array(6).keys()).map(x =>
                                <Tor key={`H_T${x}`} num={x.toString()} direction={"H"} states={this.props.buoyStates}/>
                            )
                        }
                        <p id="beschriftung"> Hinfahrt </p>
                    </div>
                    <div className="parcours" id="rueckfahrt">
                        <div className="s_boje" id="p_sb_l">
                            <Boje id={"sb_l"} state={this.props.buoyStates["SB_l"]}/>
                        </div>
                        <div className="s_boje" id="p_sb_r">
                            <Boje id={"sb_r"} state={this.props.buoyStates["SB_l"]}/>
                        </div>
                        {
                            Array.from(Array(6).keys()).map(x =>
                                <Tor key={`R_T${x}`} num={x.toString()} direction={"R"} states={this.props.buoyStates}/>
                            )
                        }
                    <p id="beschriftung"> Rückfahrt </p>
                </div>
            </div>
    </div>
        );
    }


}