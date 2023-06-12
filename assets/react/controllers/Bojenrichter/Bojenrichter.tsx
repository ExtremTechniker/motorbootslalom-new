import React, { Component } from 'react';
import {Field, Formik} from 'formik';
import * as Yup from 'yup';

import routing from "../../../routing";

import 'bootstrap/dist/css/bootstrap.min.css';
import './bojenrichter.css';

import Parcours from "./Parcours";
import Steg from "./Steg";
import T5Durchfahrt from "./T5Durchfahrt";
import Schikane from "./Schikane";
import DisqAnforderung from "./DisqAnforderung";
import Zeitnahme from "./Zeitnahme";
import Durchreissen from "./Durchreissen";
import {ObjectSchema} from "yup";
import {AktuellerStarter} from "./AktuellerStarter";


export interface BojenRichterProps {
    bojenStates: {
        [key: string]: -1 | 0 | 1
    },
    aktuellerStarter: {
        vorname: string
        nachname: string
        klasse: "ME" | "M1" | "M2" | "M3" | "M4" | "M5" | "M6" | "M7"
        startnummer: string
        lauf: string
        zusatzgewicht: number
    }
}

export interface BojenRichterState {
    bojenStates: {
        [key: string]: -1 | 0 | 1
    },
    aktuellerStarter: AktuellerStarter
    values: {
        [key: string]: unknown
    }
}

export default class Bojenrichter extends Component<BojenRichterProps, BojenRichterState> {
    private schema: ObjectSchema<any>;

    constructor(props) {
        super(props);
        this.state = {
            bojenStates: props.bojenStates,
            aktuellerStarter: props.aktuellerStarter,
            values: {}
        }
        this.schema = Yup.object().shape({
            'buoys': Yup.array().of(Yup.string().required())
        })
    }

    setValues(values) {
        this.setState((prev) => ({
            ...prev,
            values: values
        }))
    }

    render() {

        return (
            <Formik
                initialValues={{}}
                onSubmit={values => fetch(routing.generate("app_api_v1_bojenrichter_wkr_input"), {body: JSON.stringify(values), method: "POST", headers: {"Content-Type": "application/json"}})}
            >
                {({ handleChange, handleBlur, handleSubmit, values }) => (
                    <>
                        <Parcours buoyStates={this.state.bojenStates}/>
                        <Steg aktuellerStarter={this.state.aktuellerStarter}/>
                        <T5Durchfahrt aktuellerStarter={this.state.aktuellerStarter}/>
                        <Schikane aktuellerStarter={this.state.aktuellerStarter}/>
                        <Durchreissen aktuellerStarter={this.state.aktuellerStarter}/>
                        <Zeitnahme aktuellerStarter={this.state.aktuellerStarter}/>
                        <DisqAnforderung aktuellerStarter={this.state.aktuellerStarter}/>
                        <Field type={"submit"} onClick={handleSubmit}>Submit</Field>
                    </>
                )}
            </Formik>
        );
    }


}