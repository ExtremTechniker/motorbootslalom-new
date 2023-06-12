import React, { Component } from 'react';
import {Field} from "formik";
import {AktuellerStarter} from "./AktuellerStarter";

export interface ZeitnahmeProps {
    aktuellerStarter: AktuellerStarter
}

export default class Zeitnahme extends Component<ZeitnahmeProps> {

    render() {
        return (
            <>
                <h1> Zeitnahme </h1>
                <p>
                    <label htmlFor="Zeit_elektronisch">
                        Elektronisch gemessene Zeit in Sekunden:
                        optional</label>
                    <br/><Field type="number" name="Zeit_elektronisch" id="Zeit_elektronisch" step="0.001" min="0.0"/>
                </p>
                <p>
                    <label htmlFor="Zeit_manuell_1"> Manuell gemessene Zeit in Sekunden (1): </label>
                    <br/><Field type="number" name="Zeit_manuell_1" id="Zeit_manuell_1" step="0.001" min="0.0"/>
                </p>
                <p>
                    <label htmlFor="Zeit_manuell_2"> Manuell gemessene Zeit in Sekunden (2): </label>
                    <br/><Field type="number" name="Zeit_manuell_2" id="Zeit_manuell_2" step="0.001" min="0.0"/>
                </p>
            </>
        )
    }

}