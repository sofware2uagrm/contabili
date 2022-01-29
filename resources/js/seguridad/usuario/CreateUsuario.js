
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import axios from 'axios';
import { Button, Card, Col, Row } from 'antd';

import { IconButton, InputAdornment } from '@mui/material';
import Visibility from '@mui/icons-material/Visibility';
import VisibilityOff from '@mui/icons-material/VisibilityOff';

import TextField from '@mui/material/TextField';
import Swal from 'sweetalert2';
import 'antd/dist/antd.css';

function UsuarioCreate( props ) {
    return (
        <>
            <UsuarioCreatePrivate 
            />
        </>
    );
};

class UsuarioCreatePrivate extends Component {

    constructor( props) {
        super( props );
        this.state = {
            visible_store: false,
            loading: false,
            disabled: false,

            showPassword: false,

            arrayGrupoUsuario: [],
            fkidgrupousuario: "",

            nombre: "",
            apellido: "",
            email: "",
            login: "",
            password: "",
            imagen: "",

            errornombre: false,
            errorapellido: false,
            erroremail: false,
            errorlogin: false,
            errorpassword: false,
        };
    };
    componentDidMount() {
            this.get_data();
    };
    get_data( ) {
        axios.get( "/api/usuario/create" ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                this.setState( {
                    arrayGrupoUsuario: resp.data.arrayGrupoUsuario,
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
    onChangeNombre( evt ) {
        this.setState( {
            nombre: evt.target.value,
            errornombre: false,
        } );
    };
    onChangeApellido( evt ) {
        this.setState( {
            apellido: evt.target.value,
            errorapellido: false,
        } );
    };
    onChangeEmail( evt ) {
        this.setState( {
            email: evt.target.value,
            erroremail: false,
        } );
    };
    onChangeLogin( evt ) {
        this.setState( {
            login: evt.target.value,
            errorlogin: false,
        } );
    };
    onChangePassword( evt ) {
        this.setState( {
            password: evt.target.value,
            errorpassword: false,
        } );
    };
    onChangeFkIDGrupoUsuario( evt ) {
        this.setState( {
            fkidgrupousuario: evt.target.value,
        } );
    };
    onValidate() {
        let isvalidate = false;
        if ( this.state.nombre.toString().trim().length === 0 ) {
            this.setState( { errornombre: true, } );
            isvalidate = true;
        }
        if ( this.state.apellido.toString().trim().length === 0 ) {
            this.setState( { errorapellido: true, } );
            isvalidate = true;
        }
        if ( this.state.email.toString().trim().length === 0 ) {
            this.setState( { erroremail: true, } );
            isvalidate = true;
        }
        if ( this.state.login.toString().trim().length === 0 ) {
            this.setState( { errorlogin: true, } );
            isvalidate = true;
        }
        if ( this.state.password.toString().trim().length === 0 ) {
            this.setState( { errorpassword: true, } );
            isvalidate = true;
        }
        if ( this.state.password.toString().trim().length < 6 ) {
            this.setState( { errorpassword: true, } );
            Swal.fire( {
                position: 'top-end',
                icon: 'warning',
                title: 'Campo Contraseña se permite 6 caracteres minimo.',
                showConfirmButton: false,
                timer: 4000
            } );
            return;
        }
        if ( isvalidate ) {
            Swal.fire( {
                position: 'top-end',
                icon: 'warning',
                title: 'Existe campo requerido por llenar',
                showConfirmButton: false,
                timer: 1500
            } );
            return;
        }
        this.onStore();
    }
    getDate() {
        let date = new Date();
        let year = date.getFullYear();
        let mounth = date.getMonth() + 1;
        let day = date.getDate();
        return year + "-" + mounth + '-' + day;
    }
    getTime() {
        let date = new Date();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        hours = hours > 9 ? hours : '0' + hours;
        minutes = minutes > 9 ? minutes : '0' + minutes;
        seconds = seconds > 9 ? seconds : '0' + seconds;
        return hours + ':' + minutes + ':' + seconds;
    }
    onStore() {
        let body = {
            name: this.state.nombre,
            apellido: this.state.apellido,
            email: this.state.email,
            apellido: this.state.apellido,
            login: this.state.login,
            password: this.state.password,
            fkidgrupousuario: this.state.fkidgrupousuario,
            x_fecha: this.getDate(),
            x_hora: this.getTime(),
        };
        this.setState( { disabled: true, } );
        axios.post( "/api/usuario/store", body ) . then ( ( resp ) => {
            console.log(resp)
            this.setState( { disabled: false, } );
            if ( resp.data.rpta === 1 ) {
                Swal.fire( {
                    position: 'top-end',
                    icon: 'success',
                    title: resp.data.message,
                    showConfirmButton: false,
                    timer: 1500
                } );
                document.getElementById('goBackUsuario').click();
                return;
            }
            if ( resp.data.rpta === 0 ) {
                Swal.fire( {
                    position: 'top-end',
                    icon: 'error',
                    title: resp.data.message,
                    showConfirmButton: false,
                    timer: 1500,
                } );
                this.setState( { errorlogin: true, } );
                return;
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
            this.setState( { disabled: false, } );
        } );
    }
    onBack() {
        this.props.navigate( "/usuario/index" );
    };
    render() {
        return (
            <>
                <Card title={"NUEVO USUARIO"} bordered 
                    extra={ 
                        <Button type="primary" danger disabled={this.state.disabled}
                            href='/usuario/index'
                        >
                            Atras
                        </Button> 
                    }
                    style={{ minWidth: '100%', width: '100%', maxWidth: '100%', }}
                >
                    <Row gutter={[16, 24]}>
                        <Col xs={{ span: 24, }} sm={ { span: 8, } } >
                            <TextField
                                fullWidth
                                label="Nombre" size="small"
                                value={this.state.nombre}
                                onChange={this.onChangeNombre.bind(this)}
                                error={this.state.errornombre}
                                helperText={ this.state.errornombre && "Campo requerido." }
                            />
                        </Col>
                        <Col xs={{ span: 24, }} sm={ { span: 16, } } >
                            <TextField
                                fullWidth
                                label="Apellido" size="small"
                                value={this.state.apellido}
                                onChange={this.onChangeApellido.bind(this)}
                                error={this.state.errorapellido}
                                helperText={ this.state.errorapellido && "Campo requerido." }
                            />
                        </Col>
                    </Row>
                    <Row gutter={[16, 24]} style={ { marginTop: 20,} }>
                        <Col xs={{ span: 24, }} sm={ { span: 24, } } >
                            <TextField
                                fullWidth
                                label="Email" size="small"
                                value={this.state.email}
                                onChange={this.onChangeEmail.bind(this)}
                                error={this.state.erroremail}
                                helperText={ this.state.erroremail && "Campo requerido." }
                            />
                        </Col>
                    </Row>
                    <Row gutter={[16, 24]} style={ { marginTop: 20,} }>
                        <Col xs={{ span: 24, }} sm={ { span: 8, } } >
                            <TextField
                                fullWidth select focused
                                label="Grupo Usuario" size="small"
                                value={this.state.fkidgrupousuario}
                                onChange={this.onChangeFkIDGrupoUsuario.bind(this)}
                                SelectProps={ {
                                    native: true,
                                } }
                            >
                                <option value={""}>Ninguno</option>
                                { this.state.arrayGrupoUsuario.map( ( item, index ) => {
                                    return (
                                        <option key={index} value={ item.idgrupousuario }>
                                            { item.descripcion }
                                        </option>
                                    );
                                } ) }
                            </TextField>
                        </Col>
                        <Col xs={{ span: 24, }} sm={ { span: 8, } } >
                            <TextField
                                fullWidth
                                label="Usuario" size="small"
                                value={this.state.login}
                                onChange={this.onChangeLogin.bind(this)}
                                error={this.state.errorlogin}
                                helperText={ this.state.errorlogin && "Campo requerido." }
                            />
                        </Col>
                        <Col xs={{ span: 24, }} sm={ { span: 8, } } >
                            <TextField
                                fullWidth type={ this.state.showPassword ? 'text' : 'password' }
                                label="Contraseña" size="small"
                                value={this.state.password}
                                onChange={this.onChangePassword.bind(this)}
                                error={this.state.errorpassword}
                                helperText={ this.state.errorpassword && "Campo requerido." }
                                InputProps={ {
                                    endAdornment: 
                                        <InputAdornment position="end">
                                          <IconButton
                                            aria-label="toggle password visibility"
                                            onClick={ () => this.setState( { showPassword: !this.state.showPassword } ) }
                                            onMouseDown={ (evt) => evt.preventDefault() }
                                            edge="end"
                                          >
                                            {this.state.showPassword ? <VisibilityOff /> : <Visibility />}
                                          </IconButton>
                                        </InputAdornment>
                                    
                                } }
                            />
                        </Col>
                    </Row>
                    <Row gutter={[16, 24]} style={ { marginTop: 20,} } justify='center'>
                        <Button danger style={ { marginRight: 5, } }
                            disabled={this.state.disabled}
                            href='/usuario/index' id='goBackUsuario'
                        >
                            Cancelar
                        </Button>
                        <Button type="primary" danger disabled={this.state.disabled}
                            onClick={this.onValidate.bind(this)}
                        >
                            Guardar
                        </Button>
                    </Row>
                </Card>
            </>
        );
    }
};

export default UsuarioCreate;

if (document.getElementById('CreateUsuario')) {
    ReactDOM.render(<UsuarioCreate />, document.getElementById('CreateUsuario'));
}
