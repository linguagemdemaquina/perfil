# Powered by Linguagem de Máquina using PyQT6
# ==========================================================

# Resources and documentations : 
# https://www.riverbankcomputing.com/static/Docs/PyQt6/ 
# ==========================================================

import sys
import mysql.connector
import os

from pathlib import Path

caminho_relativo = os.getcwd()
caminho_relativo = caminho_relativo + '\PADRÕES\PYTHON\PYQT6\PROJETO_1'
caminho_logomarca = caminho_relativo + '\imagens\logomarca.png'
caminho_logomarca_horizontal = caminho_relativo + '\imagens\logomarca_horizontal.png' 
caminho_imagem_instagram = caminho_relativo + '\imagens\instagram.png'
caminho_imagem_profile = caminho_relativo + '\imagens\profile.png'

caminho_qss = caminho_relativo +  '\qss\estilo.qss'

from PyQt6.QtWidgets import QApplication,  QWidget, QLabel, QLineEdit, QPushButton, QVBoxLayout, QMessageBox
from PyQt6.QtCore import Qt
from PyQt6.QtGui import QIcon, QPixmap, QCursor


class TeladeLogin(QWidget):
    def __init__(self, parent=None):
        super(TeladeLogin,self).__init__(parent)

        self.setWindowTitle('ERP - TELA DE LOGIN')
        self.setWindowIcon(QIcon(caminho_logomarca))
        self.setFixedWidth(300)
        self.setFixedHeight(500)

        layout_login = QVBoxLayout()
        layout_login.setContentsMargins(10,10,10,10)
        layout_login.setObjectName('layout_login')
        self.setLayout(layout_login)

        imagemLogomarca = QLabel()
        logomarcaGrande = QPixmap(caminho_logomarca_horizontal)
        imagemLogomarca.setPixmap(logomarcaGrande)
        imagemLogomarca.setObjectName('imagemLogomarcaHorizontal')
        imagemLogomarca.setAlignment(Qt.AlignmentFlag.AlignCenter)

        tituloDeSecao = QLabel('ERP - TELA DE LOGIN')
        tituloDeSecao.setObjectName('tituloDeSecao')
        tituloDeSecao.setAlignment(Qt.AlignmentFlag.AlignCenter)

        imagemProfile = QLabel()
        profile = QPixmap(caminho_imagem_profile)
        imagemProfile.setPixmap(profile)
        imagemProfile.setObjectName('imagemProfile')
        imagemProfile.setAlignment(Qt.AlignmentFlag.AlignCenter)
        
        nomeDeUsuario = QLineEdit()
        nomeDeUsuario.setObjectName('nomeDeUsuario')
        nomeDeUsuario.setAlignment(Qt.AlignmentFlag.AlignCenter)

       
        # ESTRUTURAÇÃO DO LAYOUT - TELA DE LOGIN
        layout_login.addWidget(imagemLogomarca)
        layout_login.addWidget(tituloDeSecao)
        layout_login.addWidget(imagemProfile)
        layout_login.addWidget(nomeDeUsuario)

        


class TelaPrincipal(QWidget):
    def __init__(self, parent=None):
        super(TelaPrincipal,self).__init__(parent)

        self.janelaAuxiliar = None
     
        self.setWindowTitle('ERP - SISTEMA DE GESTÃO INTEGRADA')
        self.setWindowIcon(QIcon(caminho_logomarca))
        self.setFixedWidth(300)
        self.setFixedHeight(500)
        
        layout = QVBoxLayout()
        layout.setContentsMargins(10,10,10,10)
        layout.setObjectName('layout')
        self.setLayout(layout)
        
        imagemLogomarca = QLabel()
        logomarcaGrande = QPixmap(caminho_logomarca_horizontal)
        imagemLogomarca.setPixmap(logomarcaGrande)
        imagemLogomarca.setObjectName('imagemLogomarcaHorizontal')
        imagemLogomarca.setAlignment(Qt.AlignmentFlag.AlignCenter)


        tituloDeSecao = QLabel('ERP - SISTEMA DE GESTÃO INTEGRADA')
        tituloDeSecao.setObjectName('tituloDeSecao')
        tituloDeSecao.setAlignment(Qt.AlignmentFlag.AlignCenter)

        
        tituloEmail = QLabel ('EMAIL')
        tituloEmail.setObjectName('tituloEmail')
        tituloEmail.setAlignment(Qt.AlignmentFlag.AlignCenter)
        
        
        email = QLineEdit(self)
        email.setPlaceholderText('DIGITE SEU EMAIL')
        email.setObjectName('email')
        

        tituloSenha = QLabel('SENHA')
        tituloSenha.setObjectName('tituloSenha')
        tituloSenha.setAlignment(Qt.AlignmentFlag.AlignHCenter)

        senha = QLineEdit(self)
        senha.setEchoMode(QLineEdit.EchoMode.Password)
        senha.setPlaceholderText('DIGITE SUA SENHA')
        senha.setObjectName('senha')

        
        #ROTINA DE LOGIN
        def efetuaLogin():
            valorEmail = email.text()
            valorSenha = senha.text()

            # CONECTA A UM BANCO DE DADOS MYSQL
            mydb = mysql.connector.connect(
            host="localhost",
            user="adm_agendamento",
            password="1234",
            database="erp_pyqt6"
            )

            # DEFINE A BUSCA SQL PARA LOGIN
            busca = mydb.cursor()
            sql = "SELECT * FROM usuarios WHERE email= '"+ valorEmail +"' AND senha= '" + valorSenha + "'"
            
            busca.execute(sql)
            resultado = list(busca.fetchall())
            
            quantidade = busca.rowcount

            # VALIDA O USUÁRIO        
            print(quantidade)

            if quantidade == 1 :
                print("Usuário logado")
                #CAPTURA DADOS DO BANCO PARA USO
                for row in resultado :
                    nomeBD = row[1]
                    cpfBD = row[2]
                    emailBD = row[3]

                    print("Nome : " + nomeBD + " - CPF : " + cpfBD + " - EMAIL : " + emailBD)
                
                # OCULTA A TELA PRINCIPAL - ENTRADA DE LOGIN E SENHA
                self.hide()

                # ABRE A TELA AUXILIAR - LOGADA
                if self.janelaAuxiliar is None:
                    self.janelaAuxiliar = TeladeLogin()
                    self.janelaAuxiliar.show()
                else:
                    self.janelaAuxiliar.close()
                    self.janelaAuxiliar = None
            else:
                # ALERTA DE ERRO - USUÁRIO NÃO LOGADO / NÃO ENCONTRADO
                print("Usuário não logado")

                mensagemDeErro = QMessageBox(self) 
                mensagemDeErro.setObjectName('mensagemDeErro') 
                mensagemDeErro.setFixedWidth(100)
                mensagemDeErro.setFixedHeight(100)
                mensagemDeErro.setWindowIcon(QIcon(caminho_logomarca))
                mensagemDeErro.setWindowTitle('ERP - SISTEMA DE GESTÃO INTEGRADA')
                mensagemDeErro.setStyleSheet('QLabel{ color: #b6ac95}')        
                mensagemDeErro.setText('ERRO : LOGIN NÃO EFETUADO !')
                mensagemDeErro.setStandardButtons(QMessageBox.StandardButton.Ok)

                mensagemDeErro.exec()

 

        botao_login = QPushButton('LOGIN')
        botao_login.setObjectName('botaoLogin')
        botao_login.setCursor(QCursor(Qt.CursorShape.PointingHandCursor))
        botao_login.clicked.connect(efetuaLogin)
        

        botaoInstagram = QPushButton('INSTAGRAM')
        instagram = QIcon(QPixmap(caminho_imagem_instagram))
        botaoInstagram.setIcon(instagram)
        botaoInstagram.setObjectName('botaoInstagram')
        botaoInstagram.setCursor(QCursor(Qt.CursorShape.PointingHandCursor))

        # ESTRUTURAÇÃO DO LAYOUT - TELA PRINCIPAL
        layout.addWidget(imagemLogomarca)
        layout.addWidget(tituloDeSecao)        
        layout.addWidget(tituloEmail)
        layout.addWidget(email)
        layout.addWidget(tituloSenha)
        layout.addWidget(senha)
        layout.addWidget(botao_login, alignment=Qt.AlignmentFlag.AlignHCenter)
        layout.addWidget(botaoInstagram, alignment=Qt.AlignmentFlag.AlignHCenter)


def main():
    app = QApplication(sys.argv)
    app.setStyleSheet(Path(caminho_qss).read_text())
    main = TelaPrincipal()
    main.show()
    sys.exit(app.exec())
 
if __name__ == '__main__':
    main()