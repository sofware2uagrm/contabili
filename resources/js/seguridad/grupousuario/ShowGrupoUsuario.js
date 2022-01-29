
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import axios from 'axios';
import { Button, Card, Col, Row } from 'antd';

import TextField from '@mui/material/TextField';
import Swal from 'sweetalert2';
import 'antd/dist/antd.css';

function GrupoUsuarioShow( props ) {
    return (
        <>
            <GrupoUsuarioShowPrivate />
        </>
    );
};

class GrupoUsuarioShowPrivate extends Component {

    constructor( props) {
        super( props );
        this.state = {
            visible_store: false,
            loading: false,
            disabled: false,

            descripcion: "",
            nota: "",

            errordescripcion: false,
            errornota: false,
        };
    };
    componentDidMount() {
        this.get_data();
    };
    get_data( ) {
        let idgrupousuario = document.getElementById( 'idgrupousuario' ).value;
        axios.get( "/api/grupousuario/show/" + idgrupousuario ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                this.setState( {
                    descripcion: resp.data.grupousuario.descripcion,
                    nota: resp.data.grupousuario.nota ? resp.data.grupousuario.nota : "",
                } );
            }
            if ( resp.data.rpta === -5 ) {
                Swal.fire( {
                    position: 'top-end',
                    icon: 'warning',
                    title: resp.data.message,
                    showConfirmButton: false,
                    timer: 1500
                } );
            }

        } ) . catch ( ( error ) => {
            console.log(error);
            Swal.fire( {
                position: 'top-end',
                icon: 'error',
                title: 'Hubo problemas con el servidor',
                showConfirmButton: false,
                timer: 1500
            } );
        } );
    };
    render() {
        return (
            <>
                <Card title={"DETALLE GRUPO USUARIO"} bordered 
                    extra={ 
                        <Button type="primary" danger
                            href='/grupo_usuario/index'
                        >
                            Atras
                        </Button> 
                    }
                    style={{ minWidth: '100%', width: '100%', maxWidth: '100%', }}
                >
                    <Row gutter={[16, 24]}>
                        <Col sm={{ span: 8, }}></Col>
                        <Col xs={{ span: 24, }} sm={ { span: 8, } } >
                            <TextField
                                fullWidth
                                label="Descripción" size="small"
                                value={this.state.descripcion}
                                InputProps={ {
                                    readOnly: true,
                                } }
                            />
                        </Col>
                    </Row>
                    <Row gutter={[16, 24]} style={ { marginTop: 10,} }>
                        <Col xs={{ span: 24, }} sm={ { span: 24, } } >
                            <TextField
                                fullWidth multiline minRows={3}
                                label="Nota" size="small"
                                value={this.state.nota}
                                InputProps={ {
                                    readOnly: true,
                                } }
                            />
                        </Col>
                    </Row>
                </Card>
            </>
        );
    }
};

export default GrupoUsuarioShow;

if (document.getElementById('ShowGrupoUsuario')) {
    ReactDOM.render(<GrupoUsuarioShow />, document.getElementById('ShowGrupoUsuario'));
}
