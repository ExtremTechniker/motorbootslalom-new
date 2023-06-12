import React, { Component } from 'react';
import {Field} from "formik";
import {AktuellerStarter} from "./AktuellerStarter";

export interface DurchreissenProps {
    aktuellerStarter: AktuellerStarter
}

export default class Durchreissen extends Component<DurchreissenProps> {

    render() {
        if (!["M5", "M6", "M7"].includes(this.props.aktuellerStarter.klasse)) {
            return <>
                <h1> Umgang mit dem Sportgerät </h1>
                Der Umgang mit dem Sportgerät wird erst ab der Klasse M5 bewertet.
                </>
        } else {
            return (<>
                <h1>Umgang mit dem Sportgerät</h1>
                <label>
                    <Field type="checkbox" name="Durchreissen" value="Durchreissen"/>
                        &nbsp;
                        Nicht ordnungsgemäßes Schalten (Durchreißen der Schaltung) (20 P)
                </label>
            </>);
        }
    }

}
