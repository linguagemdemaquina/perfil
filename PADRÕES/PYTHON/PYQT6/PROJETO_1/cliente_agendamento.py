# Powered by Linguagem de Máquina using PyQT6
# =========================================================

# Resources and documentations : 
# https://www.riverbankcomputing.com/static/Docs/PyQt6/ 
# =========================================================

import sys
import mysql.connector

from PyQt6.QtCore import Qt
from PyQt6.QtGui import QCursor
from PyQt6.QtWidgets import QApplication, QVBoxLayout, QWidget, QLabel, QPushButton, QLineEdit, QCalendarWidget

# Conecta a um banco de dados MySql
mydb = mysql.connector.connect(
  host="localhost",
  user="adm_agendamento",
  password="1234",
  database="agendamento"
)

# Define a busca SQL no banco de dados
busca = mydb.cursor()
sql = "SELECT * FROM cliente"
busca.execute(sql)
resultado = busca.fetchall()


for x in resultado:
    print(x)


# Cria o aplicativo
aplicativo = QApplication(sys.argv)

# Características da janela
# =========================================================

# Define a janela como um widjet
janela =  QWidget()

# Define o título da janela 
janela.setWindowTitle("SISTEMA DE AGENDAMENTO")
# Define o tamanho da janela
janela.resize(400,600)

# Caracteríticas do conteúdo da janela
# =========================================================

# Label de título da seção
label_titulo_secao = QLabel ("DADOS DO CLIENTE")
# Alinha o label no centro
label_titulo_secao.setAlignment(Qt.AlignmentFlag.AlignCenter)
# Atribui o CSS aplicável
label_titulo_secao.setStyleSheet('font-size:16px; font-weight:bold; margin-top:10px; margin-bottom:10px; color:#3366FF;')

# Campo de entrada de dados - cpf
cpf =  QLineEdit()
# Define um tamanho fixo para o campo de entrada de dados
cpf.setFixedWidth(100)


# Composição do layout
# =========================================================

# Define o layout vertical (VBoxLayout)
layout =  QVBoxLayout()

# Estrutura os elementos de layout
# =========================================================

layout.addWidget(label_titulo_secao)
layout.addWidget(cpf, alignment=Qt.AlignmentFlag.AlignCenter)


# Integra o layout montado à janela
# =========================================================
janela.setLayout(layout)

# Exibe a janela
# =========================================================
janela.show()

# Executa o aplicativo
# =========================================================
aplicativo.exec()