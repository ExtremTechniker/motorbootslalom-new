import React, { Component } from 'react';
import {Field} from "formik";
import {AktuellerStarter} from "./AktuellerStarter";

export interface SchikaneProps {
    aktuellerStarter: AktuellerStarter
}

export default class Schikane extends Component<SchikaneProps> {

    render() {
        if ( ["ME", "M1", "M2", "M3"].includes(this.props.aktuellerStarter.klasse)) {
            return <>
                <h1> Schikane </h1>
                Die startende Klasse muss das Manöver "Schikane" nicht absolvieren.
                </>
        } else {
            return (<>
                <h1> Schikane </h1>
                <label>
                    <Field type="checkbox" name="Schikane" value="Ueberfahren"/>
                        &nbsp;
                        Überfahren der Schikane (10 P)
                </label>
                <br/>
                <label>
                    <Field type="checkbox" name="Schikane" value="niLeerlauf"/>
                        &nbsp;
                        Schaltung nicht im Leerlauf (10 P)
                </label>
                <br/>
                <label>
                    <Field type="checkbox" name="Schikane" value="nhg"/>
                        &nbsp;
                        Rettungsring nicht mit beiden Händen über die Mittelsäule gehoben (10 P)
                </label>
                <br/>
                <label>
                    <Field type="checkbox" name="Schikane" value="nva"/>
                        &nbsp;
                        Rettungsring nicht mit beiden Händen vollständig abgelegt (10 P)
                </label>
            </>);
        }
    }

}