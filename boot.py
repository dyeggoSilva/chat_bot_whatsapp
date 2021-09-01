from selenium import webdriver
import time
from selenium.webdriver.common.keys import Keys
import requests

driver = webdriver.Chrome()
driver.get('https://web.whatsapp.com/')

#tempo para iniciar a busca das notificações
time.sleep(20)

def bot():
	try:
		#localização i icone da notificação  #ação para o click na bolinha da notificação
		bolinha = driver.find_element_by_class_name('_23LrM')
		bolinha = driver.find_elements_by_class_name('_23LrM')
		clica_bolinha = bolinha[-1]
		acao_bolinha = webdriver.common.action_chains.ActionChains(driver)
		acao_bolinha.move_to_element_with_offset(clica_bolinha,0, -20)
		acao_bolinha.click()
		acao_bolinha.perform()
		acao_bolinha.click()
		acao_bolinha.perform()
		#t
		telefone_cliente = driver.find_element_by_xpath('//*[@id="main"]/header/div[2]/div/div/span')
		telefonefinal = telefone_cliente.text
		print(telefonefinal)
		#a
		todas_as_msg = driver.find_elements_by_class_name('_1Gy50')
		todas_as_msg_texto = [e.text for e in todas_as_msg]
		msg=todas_as_msg_texto[-1]
		print(msg)
		#d
		campo_de_txt = driver.find_element_by_xpath('//*[@id="main"]/footer/div[1]/div[2]/div/div[1]/div/div[2]')
		campo_de_txt.click()

		#busca da resposta no php
		resposta = requests.get("http://localhost/bot/index.php", params ={'msg': {msg},'telefone':{telefonefinal}})
		bot_resposta = resposta.text
		time.sleep(3)
		campo_de_txt.send_keys(bot_resposta, Keys.ENTER)
		#r
		todas_as_msg = driver.find_elements_by_class_name('_1Gy50')
		todas_as_msg_texto = [e.text for e in todas_as_msg]
		msg=todas_as_msg_texto[-1]
		#s
		fix = driver.find_element_by_class_name('_1pJ9J')
		fix = driver.find_elements_by_class_name('_1pJ9J')
		clica_fix = fix[-1]

		acao_fix = webdriver.common.action_chains.ActionChains(driver)
		acao_fix.move_to_element_with_offset(clica_fix,0, -20)
		acao_fix.click()
		acao_fix.perform()
		acao_fix.click()
		acao_fix.perform()

	except:

		print("Buscando mensagens...")
		time.sleep(3)
while True:
	bot()
	
		
