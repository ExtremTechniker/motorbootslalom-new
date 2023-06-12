import React, { Component } from 'react';
import {Field} from "formik";
import {AktuellerStarter} from "./AktuellerStarter";

export interface T5DurchfahrtProps {
    aktuellerStarter: AktuellerStarter
}
export default class T5Durchfahrt extends Component<T5DurchfahrtProps> {

    render() {
        if (["ME", "M1"].includes(this.props.aktuellerStarter.klasse)) {
            return <>
                <h1> Rückwärtstor </h1>
                Die startende Klasse muss das Manöver "Rückwärtstor" nicht absolvieren.
                </>
        } else {
            return (<>
                <h1> Rückwärtstor </h1>
                <label>
                    <Field type="checkbox" name="T5_Durchfahrt" value="nv"/>
                        &nbsp;
                        Einfahrt mit nicht gesamter Länge (20 P)
                </label>
            </>);
        }
    }

}