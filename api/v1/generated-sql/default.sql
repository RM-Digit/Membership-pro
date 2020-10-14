
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- access_level_details
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `access_level_details`;

CREATE TABLE `access_level_details`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `access_level_id` INTEGER NOT NULL,
    `access_level_option_id` INTEGER NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `access_level_id` (`access_level_id`),
    INDEX `access_level_option_id` (`access_level_option_id`),
    CONSTRAINT `access_level_details_ibfk_1`
        FOREIGN KEY (`access_level_id`)
        REFERENCES `access_levels` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `access_level_details_ibfk_2`
        FOREIGN KEY (`access_level_option_id`)
        REFERENCES `access_level_options` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- access_level_options
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `access_level_options`;

CREATE TABLE `access_level_options`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `package` VARCHAR(50) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `client_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `client_id` (`client_id`),
    CONSTRAINT `access_level_options_ibfk_1`
        FOREIGN KEY (`client_id`)
        REFERENCES `clients` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- access_levels
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `access_levels`;

CREATE TABLE `access_levels`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `client_id` INTEGER,
    `name` VARCHAR(125) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `client_id` (`client_id`),
    CONSTRAINT `access_levels_ibfk_1`
        FOREIGN KEY (`client_id`)
        REFERENCES `clients` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- action_tracking
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `action_tracking`;

CREATE TABLE `action_tracking`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `client_id` INTEGER NOT NULL,
    `project_id` INTEGER NOT NULL,
    `table_modified` VARCHAR(25) NOT NULL,
    `record_id` INTEGER NOT NULL,
    `field_label` VARCHAR(255) NOT NULL,
    `old_value` LONGTEXT NOT NULL,
    `new_value` LONGTEXT NOT NULL,
    `caption` VARCHAR(255) NOT NULL,
    `icon` VARCHAR(25) NOT NULL,
    `date_time_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `user_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `user_id` (`user_id`),
    INDEX `project_id` (`project_id`),
    INDEX `client_id` (`client_id`),
    CONSTRAINT `action_tracking_ibfk_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `action_tracking_ibfk_2`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `action_tracking_ibfk_3`
        FOREIGN KEY (`client_id`)
        REFERENCES `clients` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- analyze_ce_matrix
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `analyze_ce_matrix`;

CREATE TABLE `analyze_ce_matrix`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `process_step` VARCHAR(255) NOT NULL,
    `process_input` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `project_id` (`project_id`),
    CONSTRAINT `analyze_ce_matrix_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_ce_matrix_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_ce_matrix_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- analyze_ce_matrix_data
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `analyze_ce_matrix_data`;

CREATE TABLE `analyze_ce_matrix_data`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `matrix_id` INTEGER NOT NULL,
    `matrix_output_id` INTEGER,
    `correlation` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `matrix_id` (`matrix_id`),
    INDEX `matrix_output_id` (`matrix_output_id`),
    CONSTRAINT `analyze_ce_matrix_data_ibfk_1`
        FOREIGN KEY (`matrix_id`)
        REFERENCES `analyze_ce_matrix` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_ce_matrix_data_ibfk_2`
        FOREIGN KEY (`matrix_output_id`)
        REFERENCES `analyze_ce_matrix_outputs` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- analyze_ce_matrix_outputs
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `analyze_ce_matrix_outputs`;

CREATE TABLE `analyze_ce_matrix_outputs`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `process_output` VARCHAR(255) NOT NULL,
    `importance` INTEGER NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    CONSTRAINT `analyze_ce_matrix_outputs_ibfk_2`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_ce_matrix_outputs_ibfk_3`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`),
    CONSTRAINT `analyze_ce_matrix_outputs_ibfk_4`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- analyze_critical_x
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `analyze_critical_x`;

CREATE TABLE `analyze_critical_x`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `input` VARCHAR(255) NOT NULL,
    `practical_theory` VARCHAR(255) NOT NULL,
    `x_measurement` VARCHAR(255) NOT NULL,
    `stat_tested` VARCHAR(255) NOT NULL,
    `tool_used` VARCHAR(255) NOT NULL,
    `ho` VARCHAR(255) NOT NULL,
    `ha` VARCHAR(255) NOT NULL,
    `results` VARCHAR(255) NOT NULL,
    `practical_conclusions` VARCHAR(255) NOT NULL,
    `next_steps` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `project_id` (`project_id`),
    CONSTRAINT `analyze_critical_x_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_critical_x_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_critical_x_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- analyze_fmea
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `analyze_fmea`;

CREATE TABLE `analyze_fmea`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `input` VARCHAR(255) NOT NULL,
    `failure_mode` VARCHAR(255) NOT NULL,
    `failure_effects` VARCHAR(255) NOT NULL,
    `severity` VARCHAR(255) NOT NULL,
    `causes` VARCHAR(255) NOT NULL,
    `likelihood` VARCHAR(255) NOT NULL,
    `current_controls` VARCHAR(255) NOT NULL,
    `detection` VARCHAR(255) NOT NULL,
    `rpn` VARCHAR(255) NOT NULL,
    `actions_recommended` VARCHAR(255) NOT NULL,
    `resp` VARCHAR(255) NOT NULL,
    `actions_taken` VARCHAR(255) NOT NULL,
    `action_plan_severity` VARCHAR(255) NOT NULL,
    `action_plan_likelihood` VARCHAR(255) NOT NULL,
    `action_plan_detection` VARCHAR(255) NOT NULL,
    `action_plan_rpn` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    CONSTRAINT `analyze_fmea_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_fmea_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_fmea_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- analyze_gate_review
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `analyze_gate_review`;

CREATE TABLE `analyze_gate_review`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `quadrant` INTEGER NOT NULL,
    `detail` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    CONSTRAINT `analyze_gate_review_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_gate_review_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_gate_review_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- analyze_hypothesis_map
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `analyze_hypothesis_map`;

CREATE TABLE `analyze_hypothesis_map`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `svg` LONGTEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `project_id` (`project_id`),
    CONSTRAINT `analyze_hypothesis_map_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_hypothesis_map_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `analyze_hypothesis_map_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- chart_excel_data
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `chart_excel_data`;

CREATE TABLE `chart_excel_data`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `data_url` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `project_id` (`project_id`),
    CONSTRAINT `chart_excel_data_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `chart_excel_data_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `chart_excel_data_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clients
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email_address` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `primary_contact` VARCHAR(255) NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `state` VARCHAR(255) NOT NULL,
    `zip` VARCHAR(255) NOT NULL,
    `country` VARCHAR(255) NOT NULL,
    `province` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `user_id` INTEGER,
    `wordpress_id` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- control_control_plan
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `control_control_plan`;

CREATE TABLE `control_control_plan`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `process_steps` VARCHAR(255) NOT NULL,
    `ctq` VARCHAR(255) NOT NULL,
    `lsl` VARCHAR(255) NOT NULL,
    `usl` VARCHAR(255) NOT NULL,
    `unit_of_measure` VARCHAR(255) NOT NULL,
    `data_description` VARCHAR(255) NOT NULL,
    `measurement_method` VARCHAR(255) NOT NULL,
    `sample_size` INTEGER NOT NULL,
    `measurement_frequency` VARCHAR(255) NOT NULL,
    `who_measures` INTEGER,
    `where_recorded` VARCHAR(255) NOT NULL,
    `corrective_action` VARCHAR(255) NOT NULL,
    `applicable_sop` TEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `who_measures` (`who_measures`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `control_control_plan_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `control_control_plan_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `control_control_plan_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `control_control_plan_ibfk_4`
        FOREIGN KEY (`who_measures`)
        REFERENCES `users` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- control_gate_review
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `control_gate_review`;

CREATE TABLE `control_gate_review`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `quadrant` INTEGER NOT NULL,
    `detail` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    CONSTRAINT `control_gate_review_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `control_gate_review_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `control_gate_review_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- control_test_plan
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `control_test_plan`;

CREATE TABLE `control_test_plan`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `subject` enum('process','trainer','employees','') NOT NULL,
    `area` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `details` VARCHAR(255) NOT NULL,
    `expected_benefits` VARCHAR(255) NOT NULL,
    `responsible_party` INTEGER,
    `esimated_cost` VARCHAR(25) NOT NULL,
    `timing` VARCHAR(255) NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `comments` TEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `responsible_party` (`responsible_party`),
    CONSTRAINT `control_test_plan_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `control_test_plan_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `control_test_plan_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `control_test_plan_ibfk_4`
        FOREIGN KEY (`responsible_party`)
        REFERENCES `users` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- define_communication
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `define_communication`;

CREATE TABLE `define_communication`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `media` TEXT NOT NULL,
    `purpose` TEXT NOT NULL,
    `owner` INTEGER,
    `frequency` VARCHAR(255) NOT NULL,
    `day_time` VARCHAR(255) NOT NULL,
    `length` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `owner` (`owner`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `define_communication_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_communication_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_communication_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_communication_ibfk_4`
        FOREIGN KEY (`owner`)
        REFERENCES `users` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- define_gate_review
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `define_gate_review`;

CREATE TABLE `define_gate_review`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `quadrant` INTEGER NOT NULL,
    `detail` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    CONSTRAINT `define_gate_review_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_gate_review_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_gate_review_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- define_raci
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `define_raci`;

CREATE TABLE `define_raci`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `activity` VARCHAR(255) NOT NULL,
    `raci` TEXT NOT NULL,
    `owners` TEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `define_raci_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_raci_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_raci_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- define_risk_management
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `define_risk_management`;

CREATE TABLE `define_risk_management`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `date_entered` DATETIME,
    `category_area` VARCHAR(255) NOT NULL,
    `specific_risk` VARCHAR(255) NOT NULL,
    `severity` INTEGER NOT NULL,
    `likelihood` INTEGER NOT NULL,
    `detectibility` INTEGER NOT NULL,
    `risk_priority` VARCHAR(255) NOT NULL,
    `mitigation_steps` VARCHAR(255) NOT NULL,
    `person_accountable` INTEGER,
    `due_date` DATE NOT NULL,
    `contingency_plan` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `person_accountable` (`person_accountable`),
    CONSTRAINT `define_risk_management_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_risk_management_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_risk_management_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_risk_management_ibfk_4`
        FOREIGN KEY (`person_accountable`)
        REFERENCES `users` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- define_sipoc
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `define_sipoc`;

CREATE TABLE `define_sipoc`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `suppliers` VARCHAR(255) NOT NULL,
    `inputs` VARCHAR(255) NOT NULL,
    `outputs` VARCHAR(255) NOT NULL,
    `processes` VARCHAR(255) NOT NULL,
    `customers` VARCHAR(255) NOT NULL,
    `process_measures` VARCHAR(255) NOT NULL,
    `output_measures` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `define_sipoc_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_sipoc_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_sipoc_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- define_stakeholders
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `define_stakeholders`;

CREATE TABLE `define_stakeholders`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    `support_category` VARCHAR(255) NOT NULL,
    `resistance_type` VARCHAR(255) NOT NULL,
    `resistance_level` VARCHAR(255) NOT NULL,
    `resistance_strategy` TEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `user_id` (`user_id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `define_stakeholders_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_stakeholders_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_stakeholders_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_stakeholders_ibfk_4`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- define_value_stream_diagram
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `define_value_stream_diagram`;

CREATE TABLE `define_value_stream_diagram`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `svg` LONGTEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `define_value_stream_diagram_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_value_stream_diagram_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_value_stream_diagram_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- define_voc_ccr
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `define_voc_ccr`;

CREATE TABLE `define_voc_ccr`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `tool` TEXT NOT NULL,
    `quantity` INTEGER NOT NULL,
    `customer_issues` TEXT NOT NULL,
    `customer_requirements` TEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `define_voc_ccr_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_voc_ccr_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `define_voc_ccr_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- gate_review
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `gate_review`;

CREATE TABLE `gate_review`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `quadrant` INTEGER NOT NULL,
    `detail` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- improve_gate_review
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `improve_gate_review`;

CREATE TABLE `improve_gate_review`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `quadrant` INTEGER NOT NULL,
    `detail` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    CONSTRAINT `improve_gate_review_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `improve_gate_review_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `improve_gate_review_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- improve_improvement_plan
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `improve_improvement_plan`;

CREATE TABLE `improve_improvement_plan`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `process` VARCHAR(255) NOT NULL,
    `goal` VARCHAR(255) NOT NULL,
    `action_needed` VARCHAR(255) NOT NULL,
    `resource_responsible` VARCHAR(255) NOT NULL,
    `challenges` VARCHAR(255) NOT NULL,
    `measures` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `improve_improvement_plan_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `improve_improvement_plan_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `improve_improvement_plan_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- improve_value_stream_diagram
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `improve_value_stream_diagram`;

CREATE TABLE `improve_value_stream_diagram`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `svg` LONGTEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `improve_value_stream_diagram_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `improve_value_stream_diagram_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `improve_value_stream_diagram_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- measure_collection_plan
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `measure_collection_plan`;

CREATE TABLE `measure_collection_plan`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `measure` VARCHAR(255) NOT NULL,
    `measure_type` VARCHAR(255) NOT NULL,
    `data_type` VARCHAR(255) NOT NULL,
    `operational_definition` TEXT NOT NULL,
    `specification` TEXT NOT NULL,
    `target` VARCHAR(255) NOT NULL,
    `data_collection_form` VARCHAR(255) NOT NULL,
    `sampling` VARCHAR(255) NOT NULL,
    `baseline_sigma` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `measure_collection_plan_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_collection_plan_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_collection_plan_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- measure_control_plan
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `measure_control_plan`;

CREATE TABLE `measure_control_plan`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `process_steps` VARCHAR(255) NOT NULL,
    `ctq` VARCHAR(255) NOT NULL,
    `specification_characteristic` VARCHAR(255) NOT NULL,
    `lsl` VARCHAR(255) NOT NULL,
    `usl` VARCHAR(255) NOT NULL,
    `unit_of_measure` VARCHAR(255) NOT NULL,
    `data_description` VARCHAR(255) NOT NULL,
    `measurement_method` VARCHAR(255) NOT NULL,
    `sample_size` INTEGER NOT NULL,
    `measurement_frequency` VARCHAR(255) NOT NULL,
    `who_measures` INTEGER,
    `where_recorded` VARCHAR(255) NOT NULL,
    `corrective_action` VARCHAR(255) NOT NULL,
    `applicable_sop` TEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `who_measures` (`who_measures`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `measure_control_plan_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_control_plan_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_control_plan_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_control_plan_ibfk_4`
        FOREIGN KEY (`who_measures`)
        REFERENCES `users` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- measure_gate_review
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `measure_gate_review`;

CREATE TABLE `measure_gate_review`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `quadrant` INTEGER NOT NULL,
    `detail` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_id` (`phase_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    CONSTRAINT `measure_gate_review_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_gate_review_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_gate_review_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- measure_nonvalue_analysis
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `measure_nonvalue_analysis`;

CREATE TABLE `measure_nonvalue_analysis`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `Waste` VARCHAR(255) NOT NULL,
    `Improvements` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `measure_nonvalue_analysis_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_nonvalue_analysis_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_nonvalue_analysis_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- measure_value_stream_diagram
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `measure_value_stream_diagram`;

CREATE TABLE `measure_value_stream_diagram`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `svg` LONGTEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `measure_value_stream_diagram_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_value_stream_diagram_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `measure_value_stream_diagram_ibfk_3`
        FOREIGN KEY (`phase_component_id`)
        REFERENCES `phase_components` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- phase_components
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `phase_components`;

CREATE TABLE `phase_components`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `status` enum('working','complete','graded','') DEFAULT 'working' NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `grade` VARCHAR(25) NOT NULL,
    `date_time_started` DATETIME,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_id` (`phase_id`),
    CONSTRAINT `phase_components_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `phase_components_ibfk_2`
        FOREIGN KEY (`phase_id`)
        REFERENCES `project_phases` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- project_phases
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `project_phases`;

CREATE TABLE `project_phases`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    CONSTRAINT `project_phases_ibfk_1`
        FOREIGN KEY (`project_id`)
        REFERENCES `projects` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- projects
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `client_id` INTEGER NOT NULL,
    `created_by` INTEGER,
    `status` enum('active','inactive','complete','') DEFAULT 'active' NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `diagram_type` VARCHAR(255) NOT NULL,
    `lead` INTEGER,
    `sponsor` INTEGER,
    `core_team` VARCHAR(255) NOT NULL,
    `business_unit` VARCHAR(255) NOT NULL,
    `location` VARCHAR(255) NOT NULL,
    `business_impact` TEXT NOT NULL,
    `business_impact_value` VARCHAR(25) NOT NULL,
    `problem_statement` TEXT NOT NULL,
    `goals` TEXT NOT NULL,
    `scope` TEXT NOT NULL,
    `define_review_date` DATE NOT NULL,
    `measure_review_date` DATE NOT NULL,
    `analyze_review_date` DATE NOT NULL,
    `improve_review_date` DATE NOT NULL,
    `control_review_date` DATE NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `client_id` (`client_id`),
    INDEX `created_by` (`created_by`),
    INDEX `sponsor` (`sponsor`),
    INDEX `lead` (`lead`),
    CONSTRAINT `projects_ibfk_1`
        FOREIGN KEY (`client_id`)
        REFERENCES `clients` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `projects_ibfk_2`
        FOREIGN KEY (`created_by`)
        REFERENCES `users` (`id`),
    CONSTRAINT `projects_ibfk_3`
        FOREIGN KEY (`sponsor`)
        REFERENCES `users` (`id`),
    CONSTRAINT `projects_ibfk_4`
        FOREIGN KEY (`lead`)
        REFERENCES `users` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Register
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Register`;

CREATE TABLE `Register`
(
    `first_name` VARCHAR(55) NOT NULL,
    `last_name` VARCHAR(55) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `Confirmpass` VARCHAR(255) NOT NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `client_id` INTEGER,
    `status` enum('active','inactive','pending','') DEFAULT 'pending' NOT NULL,
    `access_level_id` INTEGER,
    `email_address` VARCHAR(55) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(55) NOT NULL,
    `last_name` VARCHAR(55) NOT NULL,
    `work_title` VARCHAR(255) NOT NULL,
    `reports_to` INTEGER,
    `profile_image_url` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(25) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `state` VARCHAR(255) NOT NULL,
    `zip` VARCHAR(25) NOT NULL,
    `time_zone` VARCHAR(10) NOT NULL,
    `is_logged_in` INTEGER(1) NOT NULL,
    `last_login` DATETIME,
    `created_by` INTEGER,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_time_created` DATETIME,
    `wordpress_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `status` (`status`),
    INDEX `access_level_id` (`access_level_id`),
    INDEX `email_address` (`email_address`),
    INDEX `client_id` (`client_id`),
    INDEX `reports_to` (`reports_to`),
    INDEX `password` (`password`),
    CONSTRAINT `users_ibfk_1`
        FOREIGN KEY (`client_id`)
        REFERENCES `clients` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `users_ibfk_2`
        FOREIGN KEY (`access_level_id`)
        REFERENCES `access_levels` (`id`)
        ON DELETE SET NULL,
    CONSTRAINT `users_ibfk_3`
        FOREIGN KEY (`reports_to`)
        REFERENCES `users` (`id`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- users_subscriptions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users_subscriptions`;

CREATE TABLE `users_subscriptions`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL,
    `package` VARCHAR(255) NOT NULL,
    `is_trial` INTEGER NOT NULL,
    `date_time_created` DATETIME,
    `date_time_expires` DATETIME,
    `status` VARCHAR(255) NOT NULL,
    `wordpress_id` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- value_stream_diagram
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `value_stream_diagram`;

CREATE TABLE `value_stream_diagram`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `project_id` INTEGER NOT NULL,
    `phase_id` INTEGER NOT NULL,
    `phase_component_id` INTEGER NOT NULL,
    `svg` LONGTEXT NOT NULL,
    `date_time_created` DATETIME,
    `last_updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `project_id` (`project_id`),
    INDEX `phase_component_id` (`phase_component_id`),
    INDEX `phase_id` (`phase_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
