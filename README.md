* [Sobre](#about)
* [Telas](#screen)
* [Refêrencias](#ref)

<a name="about"/>
###Sobre o projeto

**Para que o projeto funcione é necessário a instalação do Slim Framework um nível acima dentro de uma pasta Slim**

Esse site tem como fundamento facilitar o acesso a dados do Portal do Aluno da [Faculdade de Desenvolvimento do Rio Grande do Sul (FADERGS)](http://www.fadergs.edu.br/fadergs/), de forma que seja possível a navegação e visualização de dados a partir de dispositivos móveis.

Esse site não possui qualquer vínculo com a Instituição de ensino, foi desenvolvido para aprofundar conhecimentos do [desenvolvedor](https://www.facebook.com/icaromh) e não visa qualquer tipo de lucro. Seu código está disponível no [Github](https://github.com/icaromh2/give-my-grades) para qualquer pessoa que queria melhorá-lo ou utilizá-lo.

O site **NÃO guarda** nenhum tipo de dados do usuário. **NÃO são salvas senhas** ou qual aluno está logado.

Até o momento foi desenvolvido apenas a busca por notas do semestre atual, mas está em desenvolvimento para que sejam buscados novos dados. 

São eles:

* Salas em que o aluno tem aula
* Download do Boleto atual e atrasado
* Histórico do aluno
* Relatório de horas complementares
* Desenvolver busca de dados utilizando multi threads

A preocupação foi voltada para perfomance mobile e não tanto para a padronização do script que faz a busca pelos dados. No momento está todo dentro do arquivo curl.php, mas entre os planos de desenvolvimento está transformar essas buscas em Classes e assíncronas, para melhor aproveitamento do servidor. 
Por se tratar de um projeto para estudo entre os planos ainda está implementar um pré-processador de CSS (LESS ou SASS) e um automatizador de tarefas para deploy (GRUNT, preferencialmente). 

---

<a name="screen"/>
### Telas

Desktop
![alt text](https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-prn1/t1.0-9/10376087_866403226719258_2396720702805635745_n.jpg "Exeplo de tela em desktop")

Mobile
![alt text](https://scontent-b-lga.xx.fbcdn.net/hphotos-frc3/t1.0-9/10401463_866403276719253_2212956456350355719_n.jpg "Exeplo de tela em dispositivo móvel")

---

<a name="ref"/>
### Referências
[Paleta de cores](https://kuler.adobe.com/sophia-color-theme-3903803)
