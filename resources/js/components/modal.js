
import React, { useState } from 'react';
import PropTypes from 'prop-types';

import { Modal } from 'antd';
import { CloseOutlined } from '@ant-design/icons';

import Draggable from 'react-draggable';

function ComponentModal( props ) {

    const { footer, keyboard, onClose, onOk, visible, width, zIndex } = props;

    const [ draggable, setDraggable ] = useState( true );
    const [ bounds, setBounds ] = useState( { left: 0, top: 0, bottom: 0, right: 0, } );

    let bodyStyle = { padding: '20px 15px 20px 15px', };
    bodyStyle = Object.assign( bodyStyle, props.bodyStyle );

    let draggleRef = React.createRef();

    return (
        <Modal
            footer={ footer }
            
            onOk={ props.onOk }
            onCancel={ onClose }

            width={ width }
            zIndex={ zIndex }

            visible={ visible }
            keyboard={ keyboard }
            centered={ props.centered }
            maskClosable={ props.maskClosable }
            closable={ props.closable }
            confirmLoading={true}

            modalRender={ 
                ( modal ) => 
                    <Draggable 
                        disabled={ draggable }
                        bounds={ bounds }
                        onStart={ ( event, uiData ) => {
                            const { clientWidth, clientHeight } = window?.document?.documentElement;
                            const targetRect = draggleRef?.current?.getBoundingClientRect();
                            setBounds( {
                                ...bounds,
                                left:   -targetRect?.left + uiData?.x,
                                right:  clientWidth       - ( targetRect?.right - uiData?.x ),
                                top:    -targetRect?.top  + uiData?.y,
                                bottom: clientHeight      - ( targetRect?.bottom - uiData?.y ),
                            } );
                        } }
                    > 
                        <div ref={ draggleRef }>
                            { modal } 
                        </div>
                    </Draggable> 
            }
            closeIcon={
                <CloseOutlined 
                    style={{ 
                        padding: 6, borderRadius: 50, background: 'white', fontSize: 12, fontWeight: 'bold', boxShadow: '0 0 7px 0 #222', 
                        position: 'relative', top: -5, left: 4,
                    }}
                />
            }
            title={
                props.title && <div
                    style={ {
                        width: '100%', minWidth: '100%', cursor: 'move',
                    } }
                    onMouseOver={ () => {
                        if ( draggable ) {
                            setDraggable( false );
                        }
                    } }
                    onMouseOut={ () => {
                        setDraggable( true );
                    } }
                    onFocus={() => {}}
                    onBlur={() => {}}
                >
                    { props.title }
                </div>
            }

            bodyStyle={ bodyStyle }
            maskStyle={ props.maskStyle }
            style={ props.style }

            cancelText={ props.cancelText }
            okText={ props.okText }

            okButtonProps={ props.okButtonProps }
            cancelButtonProps={ props.canceltonProps }
            
        >
            { props.children }
        </Modal>
    );
};

ComponentModal.propTypes = {
    visible:      PropTypes.bool,
    centered:     PropTypes.bool,
    maskClosable: PropTypes.bool,
    keyboard:     PropTypes.bool,
    closable:     PropTypes.bool,

    zIndex: PropTypes.number,

    width:  PropTypes.any,
    title:  PropTypes.any,
    footer: PropTypes.any,

    onClose: PropTypes.func,
    onOk:    PropTypes.func,

    maskStyle: PropTypes.object,
    style:     PropTypes.object,
    bodyStyle: PropTypes.object,

    cancelText: PropTypes.node,
    okText:     PropTypes.node,

    okType: PropTypes.string,
};

ComponentModal.defaultProps = {
    visible:      false,
    centered:     false,
    maskClosable: false,
    keyboard:     false,
    closable:     true,

    width:  520,
    zIndex: 99999,

    title:      null,
    cancelText: 'Cancel',
    okText:     'OK',
    
    maskStyle: {},
    style:     {},
    bodyStyle: {},

};

export default ComponentModal;
