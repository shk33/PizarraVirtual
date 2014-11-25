<div class="tab-pane fade" id="chat">

    <!-- Init Chat -->
    <div class="panel-chat panel-primary">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-comment"></span> Chat Colaborativo
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-chevron-down"></span>
              </button>
              <ul class="dropdown-menu slidedown">
                <li>
                  <a href="http://www.jquery2dotnet.com">
                    <span class="glyphicon glyphicon-refresh"></span>Refresh
                  </a>
                </li>
              </ul>
            </div>
        </div>
        <div class="panel-body-chat">
            <?php 
                $chat_id      = $chat->id;
                $username     = $this->session->userdata('userName');
                $chat_url     = base_url()."chat/sent_message";
                $new_mess_url = base_url()."chat/get_new_messages";
                $sent_date    = 00000000;
                if ($last_message) {
                    $sent_date = $last_message->sent_date;
                }
             ?>
            <input type="hidden" id="chat_id"   value="<?php echo $chat_id  ?>" />
            <input type="hidden" id="username"  value="<?php echo $username ?>" />

            <ul class="chat" id="chat-body" data-ajax="<?php echo $chat_url ?>" data-ajax-new="<?php echo $new_mess_url ?>" data-last-timestamp="<?php echo $sent_date ?>">
                <?php foreach ($chat->messages  as $message): ?>

                    <li class="left clearfix message"><span class="chat-img pull-left">
                        <img src="http://ymcawellington.org.nz/wp-content/uploads/2013/07/person-placeholder-36x36.jpg" alt="User Avatar" class="img-circle" />
                    </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font"><?php echo $message->username ?></strong>
                            </div>
                            <p>
                                <?php echo $message->text ?>
                            </p>
                        </div>
                    </li>

                <?php endforeach ?>
            </ul>
        </div>
        <div class="panel-footer">
            <div class="input-group">
                <input id="text" type="text" class="form-control input-sm" placeholder="Escribe tu mensaje aquí..." />
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-sm" id="btn-chat-sent">
                        Enviar
                    </button>
                </span>
            </div>
        </div>
    </div>
    <!-- end chat -->                
</div>