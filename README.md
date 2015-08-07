# DESCONTINUADO

A faculdade hoje possui um novo portal, resposivo e mais agradável ao usuário não havendo mais necessidade desse projeto.



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

Mobile
![alt text](http://blog.icaromh.com/wp-content/uploads/2014/08/68747470733a2f2f73636f6e74656e742d622d6c67612e78782e666263646e2e6e65742f6870686f746f732d667263332f74312e302d392f31303430313436335f3836363430333237363731393235335f323231323935363435363335303335353731395f6e2e6a7067.jpg "Exeplo de tela em dispositivo móvel")

---

<a name="ref"/>
### Referências
[Paleta de cores](https://kuler.adobe.com/sophia-color-theme-3903803)
