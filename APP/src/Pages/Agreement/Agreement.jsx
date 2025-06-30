import Header from "../../Componentes/Header/Header";
import "./Agreement.css";

function Agreement() {
  return (
    <div className="AgreementBody">
      <Header />

      <section>
        <article>
          <h1>Termos e Condições de Uso do BlympMe</h1>

          <h2>O que é o BlympMe</h2>
          <p>
            O BlympMe é um sistema de gerenciamento de tarefas e lembretes
            diários. Foi desenvolvido com o objetivo de auxiliar pessoas que
            buscam mais organização em sua rotina. O sistema permite ao usuário
            criar, editar e excluir lembretes conforme sua necessidade,
            garantindo controle total sobre suas atividades.
          </p>

          <h2>Como utilizar o BlympMe</h2>
          <p>
            Para utilizar o BlympMe, é necessário criar uma conta. As
            informações fornecidas são utilizadas exclusivamente para o
            funcionamento adequado do sistema e não serão compartilhadas com
            terceiros.
          </p>
          <p>
            Ao criar uma tarefa, é obrigatório informar o título, descrição,
            tipo, tempo de atraso (delay) e data de início. Esses dados são
            essenciais para o correto funcionamento do sistema.
          </p>
          <p>
            Tanto o título quanto a descrição das tarefas são criptografados. No
            entanto, alertamos:
            <br />
            <strong>
              NÃO INSIRA DADOS SENSÍVEIS OU SIGILOSOS NOS CAMPOS DE TEXTO DO
              SISTEMA.
            </strong>
          </p>
          <p>
            O uso de informações pessoais ou confidenciais é de responsabilidade
            exclusiva do usuário.
          </p>
          <p>
            Os dados serão mantidos enquanto a conta do usuário estiver ativa.
            Em caso de exclusão de uma tarefa ou da própria conta, os dados
            serão permanentemente excluídos.
          </p>

          <h2>Sobre o Usuário</h2>
          <p>
            Ao criar uma conta e utilizar o BlympMe, o usuário concorda com as
            seguintes condições:
          </p>
          <ul>
            <li>
              Autorização para armazenar dados necessários ao funcionamento do
              sistema, como nome de usuário, senha, títulos e descrições de
              tarefas, datas e horários.
            </li>
            <li>
              Uso de nome de usuário e senha da conta BlympMe para fins de
              autenticação e organização das informações.
            </li>
            <li>
              Permissão para o envio de notificações de lembrete, de acordo com
              as tarefas cadastradas.
            </li>
            <li>
              O usuário tem total direito de excluir sua conta. No entanto, essa
              ação é irreversível, e caso deseje utilizar o BlympMe novamente,
              será necessário criar uma nova conta.
            </li>
          </ul>

          <a href="/cadastro">Quero criar uma conta</a>
        </article>
      </section>
    </div>
  );
}

export default Agreement;
