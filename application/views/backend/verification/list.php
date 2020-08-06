<div class="table-responsive animated fadeInRight">
    <table class="table m-0 table-striped">

        <tr>
            <th><?php echo get_msg('no') ?></th>
            <th><?php echo get_msg('Personal Name') ?></th>
            <th><?php echo get_msg('user_name') ?></th>
            <th><?php echo get_msg('user_email'); ?></th>
            <th><?php echo get_msg('Phone Number') ?></th>
            <th><?php echo get_msg('Business Name') ?></th>
            <th><?php echo get_msg('Passport') ?></th>
            <th><?php echo get_msg('Official ID') ?></th>
        </tr>

        <?php $count = $this->uri->segment(4) or $count = 0; ?>

        <?php if (!empty($users) && count($users->result()) > 0) : ?>

            <?php foreach ($users->result() as $user) : ?>

                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $user->personal_name; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->phone_number; ?></td>
                    <td><?php echo $user->business_name; ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary-green ban" userid=''>
                            <a href='<?php echo base_url() . 'uploads/verification/' . $user->passport ?>' target="_blank">
                                <?php echo get_msg('download'); ?>
                            </a>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary-green ban" userid=''>
                            <a href='<?php echo base_url() . 'uploads/verification/' . $user->official_id ?>' target="_blank">
                                <?php echo get_msg('download'); ?>
                            </a>
                        </button>
                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else : ?>

            <?php $this->load->view($template_path . '/partials/no_data'); ?>

        <?php endif; ?>

    </table>
</div>