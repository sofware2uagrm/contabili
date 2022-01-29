
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import axios from 'axios';
import { Button, Card, Col, Row, Table, Tooltip } from 'antd';
import { EditOutlined, EyeOutlined } from '@ant-design/icons';

import Swal from 'sweetalert2';

import 'antd/dist/antd.css';

function GrupoUsuarioIndex( ) {
    return (
        <>
            <GrupoUsuarioIndexPrivate 
            />
        </>
    );
};

class GrupoUsuarioIndexPrivate extends Component {

    constructor( props) {
        super( props );
        this.state = {
            visible_delete: false,
            loading: false,

            array_grupousuario: [],
            search: "",
            paginate: 10,
            page: 1,
            idgrupousuario: null,
        };
        this.columns = [ 
            {
                title: 'Nro',
                dataIndex: 'nro',
                key: 'nro',
            },
            {
                title: 'Descripón',
                dataIndex: 'descripcion',
                key: 'descripcion',
            },
            {
                title: 'Nota',
                dataIndex: 'nota',
                key: 'nota',
            },
            {
                title: 'Acción',
                dataIndex: 'accion',
                render: (text, record) => {
                    return (
                        <>
                            <Tooltip title="editar">
                                <Button shape="circle" style={ { marginRight: 5, } }
                                    icon={<EditOutlined style={ { position: 'relative', top: -2, } } />} 
                                    href={'/grupo_usuario/edit/' + record.grupousuario.idgrupousuario }
                                />
                            </Tooltip>
                            <Tooltip title="ver">
                                <Button shape="circle" style={ { marginRight: 5, } }
                                    icon={<EyeOutlined style={ { position: 'relative', top: -2, } } />} 
                                    href={'/grupo_usuario/show/' + record.grupousuario.idgrupousuario }
                                />
                            </Tooltip>
                        </>
                    )
                },
            }
        ];
    };
    componentDidMount() {
        this.get_data();
    };
    get_data( search = "", paginate = 10, page = 1 ) {
        axios.get( "/api/grupousuario/index?page=" + page + "&search=" + search + "&paginate=" + paginate ) . then ( ( resp ) => {
            console.log(resp)
            if ( resp.data.rpta === 1 ) {
                let array = [];
                for (let index = 0; index < resp.data.arrayGrupoUsuario.length; index++) {
                    const element = resp.data.arrayGrupoUsuario[index];
                    let detalle = {
                        nro: index,
                        descripcion: element.descripcion,
                        nota: element.nota,
                        grupousuario: element,
                    };
                    array.push(detalle);
                }
                this.setState( {
                    array_grupousuario: array,
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
                <Card title={"GRUPO USUARIO"} bordered 
                    extra={ 
                        <Button type="primary" danger
                            href='/grupo_usuario/create'
                        >
                            Nuevo
                        </Button> 
                    }
                    style={{ minWidth: '100%', width: '100%', maxWidth: '100%', }}
                >
                    <Row gutter={[16, 24]}>
                        <Col xs={{ span: 24, }}>
                            <Table columns={this.columns} dataSource={this.state.array_grupousuario} 
                                bordered style={ { width: '100%', minWidth: '100%', } } pagination={false}
                                size='small' rowKey={"nro"} scroll={{ x: '100%', }}
                            />
                        </Col>
                    </Row>
                </Card>
            </>
        );
    }
};

export default GrupoUsuarioIndex;

if (document.getElementById('IndexGrupoUsuario')) {
    ReactDOM.render(<GrupoUsuarioIndex />, document.getElementById('IndexGrupoUsuario'));
}
