import React, { Component } from 'react';
import {Field} from "formik";
import routing from "../../../routing";
import {AktuellerStarter} from "./AktuellerStarter";

export interface DisqAnforderungProps {
    aktuellerStarter: AktuellerStarter
}

export interface DisqAnforderungState {
    disq: {
        id: number
        name: string
        kurz: string
    }[]
}

export default class DisqAnforderung extends Component<DisqAnforderungProps, DisqAnforderungState> {

    constructor(props) {
        super(props);
        fetch(routing.generate("app_api_v1_bojenrichter_disqualification_reasons")).then(async (response) => {
            const json = await response.json();
            this.setState({
                disq: json
            })

        })
    }

    render() {
        return (
            <>
                <h1>Disqualifikation</h1>
                <ul>
                    {
                        this.state.disq.map((e) => (
                            <li key={e.kurz}>
                                <label><Field type={"checkbox"} name={"disq_anforderung"} value={e.kurz}/> {e.name}</label>
                            </li>
                        ))
                    }
                </ul>
            </>
        )
    }

}