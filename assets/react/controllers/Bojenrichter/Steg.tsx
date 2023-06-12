import React, { Component } from 'react';
import Boje from "./Boje";
import {Field} from "formik";
import {AktuellerStarter} from "./AktuellerStarter";

export interface StegProps {
    aktuellerStarter: AktuellerStarter
}

export default class Steg extends Component<StegProps> {

    render() {
        if (this.props.aktuellerStarter.klasse === "ME") {
            return <>
                <h1> Ablegen </h1>
                In der Klasse ME wird das Ablegen <b>nicht</b> bewertet.
                <h1> Anlegen </h1>
                In der Klasse ME wird das Anlegen <b>nicht</b> bewertet.
            </>
        } else {
            return (<>
                <h1> Ablegen </h1>
                <div className="form-group">
                    <Field type="checkbox" id="Steg_Ablegen_Stegberuehrung" name="Steg" value="Ablegen_Stegberuehrung"/>
                    <label htmlFor="Steg_Ablegen_Stegberuehrung">&nbsp;Erneute Stegberührung mit dem Sportgerät beim Ablegen (10 P)</label>
                </div>

                <div className="form-group">
                    <Field type="checkbox" id="Steg_Ablegen_Rueckwaerts" name="Steg" value="Ablegen_Rueckwaerts"/>
                    <label htmlFor="Steg_Ablegen_Rueckwaerts">&nbsp;Rückwärtsfahren beim Ablegemanöver (10 P)</label>
                </div>


                <h1>Anlegen</h1>

                <div className="form-group">
                    <Field type="checkbox" id="Steg_Anlegen_falsch" name="Steg" value="Anlegen_falsch"/>
                    <label htmlFor="Steg_Anlegen_falsch">&nbsp;Anlegen entgegen der <a href="anlegen.html" target="_blank">Definition in der Ausschreibung</a> (5 P)</label>
                </div>

                <div className="form-group">
                    <Field type="checkbox" id="Steg_Anlegen_niAnlegebereich" name="Steg" value="Anlegen_niAnlegebereich"/>
                    <label htmlFor="Steg_Anlegen_niAnlegebereich">&nbsp;Sportgerät nicht im Anlegebereich zum Stillstand gebracht (5 P)</label>
                </div>

                <div className="form-group">
                    <Field type="checkbox" id="Steg_Anlegen_niLeerlauf_Klampe" name="Steg" value="Anlegen_niLeerlauf_Klampe"/>
                    <label htmlFor="Steg_Anlegen_niLeerlauf_Klampe">&nbsp;Schalthebel nicht im Leerlauf vor dem Belegen der Klampe (5 P)</label>
                </div>

                <div className="form-group">
                    <Field type="checkbox" id="Steg_Anlegen_niLeerlauf_Quickstop" name="Steg" value="Anlegen_niLeerlauf_Quickstop"/>
                    <label htmlFor="Steg_Anlegen_niLeerlauf_Quickstop">&nbsp;Schalthebel nicht im Leerlauf vor dem Ablegen des Quickstop (5 P)</label>
                </div>

                <div className="form-group">
                    <Field type="checkbox" id="Steg_Anlegen_fKlampe" name="Steg" value="Anlegen_fKlampe"/>
                    <label htmlFor="Steg_Anlegen_fKlampe">&nbsp;Falsches Belegen der Klampe (5 P)</label>
                </div>
            </>);
        }
    }

}