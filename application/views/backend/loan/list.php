<div class="table-responsive animated fadeInRight">
    <table class="table m-0 table-striped">

        <tr>
            <th><?php echo get_msg('no') ?></th>
            <th><?php echo get_msg('Business Name') ?></th>
            <th><?php echo get_msg('user_email') ?></th>
            <th><?php echo get_msg('Address'); ?></th>
            <th><?php echo get_msg('Amount') ?></th>
            <th><?php echo get_msg('Purpose') ?></th>
            <th><?php echo get_msg('Account Details') ?></th>
            <th><?php echo get_msg('Relative 1 Name') ?></th>
            <th><?php echo get_msg('Relative 1 Phone') ?></th>
            <th><?php echo get_msg('Relative 2 Name') ?></th>
            <th><?php echo get_msg('Relative 2 Phone') ?></th>
            <th><?php echo get_msg('State') ?></th>
            <th><?php echo get_msg('Official ID') ?></th>
            <th><?php echo get_msg('First Timer') ?></th>
        </tr>

        <?php $count = $this->uri->segment(4) or $count = 0; ?>

        <?php if (!empty($users) && count($users->result()) > 0) : ?>

            <?php foreach ($users->result() as $user) : ?>

                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $user->business_name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->address; ?></td>
                    <td><?php echo $user->amount; ?></td>
                    <td><?php echo $user->purpose; ?></td>
                    <td><?php echo $user->account; ?></td>
                    <td><?php echo $user->relative_1_name; ?></td>
                    <td><?php echo $user->relative_1_phone_number; ?></td>
                    <td><?php echo $user->relative_2_name; ?></td>
                    <td><?php echo $user->relative_2_phone_number; ?></td>
                    <td><?php echo $user->state; ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary-green ban" userid=''>
                            <a href='<?php echo base_url() . 'uploads/loans/' . $user->official_id ?>' target="_blank">
                                <?php echo get_msg('download'); ?>
                            </a>
                        </button>
                    </td>
                    <?php if ($user->first_timer) : ?>
                        <td><?php echo get_msg('Yes'); ?></td>
                    <?php else : ?>
                        <td><?php echo get_msg('NO'); ?></td>
                    <?php endif ?>
                </tr>

            <?php endforeach; ?>

        <?php else : ?>

            <?php $this->load->view($template_path . '/partials/no_data'); ?>

        <?php endif; ?>

    </table>
</div>